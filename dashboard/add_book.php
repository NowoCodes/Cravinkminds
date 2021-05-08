<?php
$title = 'Add Books';
$page = 'add_book';
include '../engine/conn.php';
session_start();
ob_start();
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

include 'dashboard-nav.php';

if (isset($_POST['add'])) {
  $titlee = sanitize($_POST['title']);
  $titlee = mysqli_real_escape_string($conn, $titlee);

  $author = sanitize($_POST['author']);
  $author = mysqli_real_escape_string($conn, $author);

  $descr = sanitize($_POST['descr']);
  $descr = mysqli_real_escape_string($conn, $descr);

  $p_link = sanitize($_POST['purchase_link']);
  $p_link = mysqli_real_escape_string($conn, $p_link);

  $price = sanitize($_POST['price']);
  $price = mysqli_real_escape_string($conn, $price);

  $listprice = sanitize($_POST['list_price']);
  $listprice = mysqli_real_escape_string($conn, $listprice);

  $errors = array();
  $required = array('title', 'author', 'descr', 'price');
  foreach ($required as $field) {
    if ($_POST[$field] == '') {
      $errors[] = 'All Fields With an Asterics are Required.';
      break;
    }
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
  
    // $ebook = sanitize($_FILES['ebook']['name']);
    // $target = "../purchase/books/" . basename($ebook);
    // move_uploaded_file($_FILES['ebook']['tmp_name'], $target);
  // }

  if (!empty($errors)) {
    echo display_errors($errors);
  } else {
    // Upload file and insert into database
    if (!empty($_FILES)) {
      move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
      move_uploaded_file($_FILES['ebook']['tmp_name'], $target);
    }
    
    $imageeee = empty($image_name) ? 'default.jpg' : $image_name;
    $lp = empty($listprice) ? 0 : $listprice;

    $a = "SELECT * FROM register WHERE username = '$cravinkuname'";
    $b = mysqli_query($conn, $a);
    $c = mysqli_fetch_assoc($b);
    $d = $c['id'];

    $query = "INSERT INTO books (u_id, book_title, book_author, book_image, ebook, book_descr, book_price, list_price, purchase_link)
    VALUES ('$d', '$titlee', '$author', '$imageeee', '$book_name', '$descr', '$price', '$lp', '$purchase_link')";

    $_SESSION['success'] = 'Book has been added';
    $result = mysqli_query($conn, $query);
    header('Location: viewbooks.php');
    ob_end_flush();
  }
}

?>

<div class="container-fluid font-weight-bold">
  <main role="main" class="col-md-qw pt-1 px-3">
    <!-- <main role="main" class="col-md-qw ml-sm-auto pt-1 px-5 mx-5"> -->
    <div class="flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

      <form method="post" action="add_book.php" enctype="multipart/form-data">
        <h1 class="display-2">Add Book</h1>

        <div class="form-group">
          <label for="title">Title: <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="title" value="<?= $titlee; ?>">
        </div>
        <div class="form-group">
          <label for="author">Author: <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="author" value="<?= $author; ?>" >
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <p>Cover Image: <span class="text-danger">*</span></p>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" value="<?= $image; ?>" >
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>

          <div class="col-md-6 form-group">
            <p>Book: <span class="text-danger">*</span></p>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="ebook" value="<?= $ebook; ?>">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="descr">Description: <span class="text-danger">*</span></label>
          <textarea name="descr" class="form-control" form-control" rows="5"><?= $descr; ?></textarea>
        </div>
        <div class="form-group">
          <label for="link">Purchase Link(Optional): </label>
          <input type="text" class="form-control" name="purchase_link" value="<?= $p_link; ?>">
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="price">Price(&#8358;): <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="price" value="<?= $price ?>" >
          </div>
          <div class="col-md-6 form-group">
            <label for="list_price">Old Price(&#8358;)(Optional): </label>
            <input type="text" class="form-control" name="list_price" value="<?= $listprice; ?>">
          </div>
        </div>
    </div>
    <input type="submit" name="add" value="Add new book" class="btn btn-sm btn-success">
    <input type="reset" value="cancel" class="btn bt btn-default">
    </form>
    <br />
    <a href="viewbooks.php" type="button" class="btn btn-sm">Back</a>
  </main>
</div>

<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
</body>
<?php include '../scripts.php'; ?>

</html>