<?php
$title = 'Edit Books';
$page = 'editbook';
session_start();
ob_start();
include '../engine/conn.php';
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

include 'dashboard-nav.php';


if (isset($_POST['save_change'])) {
  $id = sanitize($_POST['id']);
  $title = sanitize($_POST['title']);
  $author = sanitize($_POST['author']);
  $descr = sanitize($_POST['descr']);
  $link = sanitize($_POST['link']);
  $price = sanitize($_POST['price']);
  $listprice = sanitize($_POST['list_price']);

  $errors = array();
  $required = array('title', 'author', 'descr', 'price');
  foreach ($required as $field) {
    if ($_POST[$field] == '') {
      $errors[] = 'All Fields With an Asterics are Required.';
      break;
    }
  }

  if ($link == '' && $_FILES['ebook']['name'] == "") {
    $errors[] = 'Either upload a book or a link. Both cannot be empty.';
  }

  if ($link != '' && $_FILES['ebook']['name'] != "") {
    $errors[] = 'You can\'t upload a book and a link.';
  }

  // add image
  if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $photo = $_FILES['image'];
    $image_name = sanitize($photo['name']);
    $nameArray = explode('.', $image_name);
    $fileName = $nameArray[0];
    $fileExt = $nameArray[1];
    $mime = explode('/', $photo['type']);
    $mimeType = $mime[0];
    $mimeExt = $mime[1];
    $fileSize = $photo['size'];
    $allowed = array('png', 'jpg', 'jpeg');
    $uploadPath = "../img/books/" . basename($image_name);
    if ($mimeType != 'image') {
      $errors[] = 'The file must be an image.';
    }
    if (!in_array($fileExt, $allowed)) {
      $errors[] = 'The image extension must be a png, jpg or jpeg.';
    }
    if ($fileSize > 15000000) {
      $errors[] = 'The file size must be under 15MB';
    }
    if ($fileExt != $mimeExt && ($mimeExt == 'jpeg' && $fileExt != 'jpg')) {
      $errors[] = 'File extension does not match the file.';
    }
  }

  if (isset($_FILES['ebook']) && $_FILES['ebook']['name'] != "") {
    $book = $_FILES['ebook'];
    $book_name = sanitize($book['name']);
    $nameArray = explode('.', $book_name);
    $fileName = $nameArray[0];
    $fileExt = $nameArray[1];
    $mime = explode('/', $book['type']);
    $mimeType = $mime[0];
    $mimeExt = $mime[1];
    $fileSize = $book['size'];
    $allowed = array('pdf', 'epub');
    $target = "../purchase/books/" . basename($book_name);
    if (!in_array($fileExt, $allowed)) {
      $errors[] = 'The book must be in pdf or epub format.';
    }
    if ($fileSize > 15000000) {
      $errors[] = 'The file size must be under 15MB';
    }
    if ($fileExt != $mimeExt && ($mimeExt == 'pdf' && $fileExt != 'epub')) {
      $errors[] = 'File extension does not match the file.';
    }
  }

  // if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
  //   $image = sanitize($_FILES['image']['name']);
  //   $target = "../img/books/" . basename($image);
  //   move_uploaded_file($_FILES['image']['tmp_name'], $target);
  // }

  // if (isset($_FILES['ebook']) && $_FILES['ebook']['name'] != "") {
  //   $ebook = sanitize($_FILES['ebook']['name']);
  //   $target = "../private/books/" . basename($ebook);
  //   move_uploaded_file($_FILES['ebook']['tmp_name'], $target);
  // }

  if (!empty($errors)) {
    echo display_errors($errors);
  } else {
    if (!empty($_FILES)) {
      move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
      move_uploaded_file($_FILES['ebook']['tmp_name'], $target);
    }

    $query = "UPDATE books SET
    book_title = '$title',
    book_author = '$author',
    book_descr = '$descr',
    purchase_link = '$link',
    book_price = '$price',
    list_price = '$listprice'";
    if (isset($image_name)) {
      $query .= ", book_image = '$image_name' WHERE `id` = '$id'";
    } else if (isset($book_name)) {
      $query .= ", ebook = '$book_name' WHERE `id` = '$id'";
    } else {
      $query .= " WHERE `id` = '$id'";
    }
    // two cases for file , if file submit is on => change a lot

    $_SESSION['success'] = 'Book has been updated';
    $result = mysqli_query($conn, $query);
    header("Location: viewbooks.php");
    ob_end_flush();
  }
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  echo "Empty query!";
  exit;
}

// get book data
$query = "SELECT * FROM books WHERE id = '$id'";
$result = mysqli_query($conn, $query);
if (!$result) {
  echo "Can't retrieve data " . mysqli_error($conn);
  exit;
}
$row = mysqli_fetch_assoc($result);
$saved_image = $row['book_image'] != '' ? $row['book_image'] : '';
$saved_book = $row['ebook'] != '' ? $row['ebook'] : '';

if (isset($_GET['delete_image'])) {
  $image_url = $_SERVER['DOCUMENT_ROOT'] . '/cravinkminds/img/books/' . $row['book_image'];
  unlink($image_url);
  $query = "UPDATE books SET book_image = '' WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
  header('Location: editbook.php?id=' . $id);
}

if (isset($_GET['delete_book'])) {
  $book_url = $_SERVER['DOCUMENT_ROOT'] . '/cravinkminds/purchase/books/' . $row['ebook'];
  unlink($book_url);
  $query = "UPDATE books SET ebook = '' WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
  header('Location: editbook.php?id=' . $id);
}
?>

<div class="container-fluid font-weight-bold">
  <main role="main" class="col-md-qw pt-1 px-3">
    <div class="justify-content-start flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

      <form method="post" action="editbook.php?id=<?= $row['id'] ?>" enctype="multipart/form-data">
        <h1 class="display-2">Edit Book</h1>

        <input value="<?= $row['id']; ?>" name="id" type="hidden">
        <div class="form-group">
          <label for="title">Title: <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="title" value="<?= $row['book_title']; ?>" >
        </div>
        <div class="form-group">
          <label for="author">Author: <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="author" value="<?= $row['book_author']; ?>" >
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <p>Cover Image: <span class="text-danger">*</span></p>
            <?php if ($saved_image != '') : ?>
              <img src="../img/books/<?= $saved_image; ?>" class=" img-fluid" style="height:300px;" alt="Saved Image">
              <a href="editbook.php?delete_image=1&id=<?= $row['id']; ?>" class="text-danger card-link">Delete Image</a></a>
            <?php else : ?>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="image">
                <label class="custom-file-label" for="customFile">Choose File</label>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-md-6 form-group">
            <p>Book(Optional if posting a link): <span class="text-danger">*</span></p>
            <?php if ($saved_book != '') : ?>
              <p><?= $row['ebook'] ?></p>
              <a href="editbook.php?delete_book=2&id=<?= $row['id']; ?>" class="text-danger card-link">Delete Book</a></a>
            <?php else : ?>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="ebook">
                <label class="custom-file-label" for="customFile">Choose File</label>
              </div>
            <?php endif; ?>
          </div>
        </div>
    </div>

    <div class="form-group">
      <label for="descr">Description: <span class="text-danger">*</span></label>
      <td><textarea name="descr" class="form-control" form-control" rows="5"><?php echo $row['book_descr']; ?></textarea>
    </div>
    <div class="form-group">
      <label for="link">Purchase Link(Optional): </label>
      <input type="text" class="form-control" name="link" value="<?php echo $row['purchase_link']; ?>">
    </div>
    <div class="row">
      <div class="col-md-6 form-group">
        <label for="price">Price(&#8358;): <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="price" value="<?php echo $row['book_price']; ?>" >
      </div>
      <div class="col-md-6 form-group">
        <label for="list_price">Old Price(&#8358;)(Optional): </label>
        <input type="text" class="form-control" name="list_price" value="<?php echo $row['list_price']; ?>">
      </div>
    </div>
    <input type="submit" name="save_change" value="Update" class="btn btn-sm btn-success">
    <input type="reset" value="cancel" class="btn btn-default btn-sm">
    </form>
    <a href="viewbooks.php" type="button" class="btn btn-sm">Back</a>
</div>
</main>
</div>
<?php
if (isset($conn)) {
  mysqli_close($conn);
}
?>

<?php include '../scripts.php'; ?>

<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
</body>

</html>