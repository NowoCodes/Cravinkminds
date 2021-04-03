<?php
include '../engine/conn.php';
session_start();
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

include 'dashboard-nav.php';


if (isset($_POST['add'])) {
  $isbn = trim($_POST['isbn']);
  $isbn = mysqli_real_escape_string($conn, $isbn);

  $title = trim($_POST['title']);
  $title = mysqli_real_escape_string($conn, $title);

  $author = trim($_POST['author']);
  $author = mysqli_real_escape_string($conn, $author);

  $descr = trim($_POST['descr']);
  $descr = mysqli_real_escape_string($conn, $descr);

  $price = floatval(trim($_POST['price']));
  $price = mysqli_real_escape_string($conn, $price);

  // add image
  if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $image = $_FILES['image']['name'];
    $img = $_FILES['image']['tmp_name'];
    $target_dir = "../img/books/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($img, $target_file);
    // $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    // $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "img/books/";
    // $uploadDirectory .= $image;
    // move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
  }
  // if (isset($_FILES['file']) && $_FILES['file']['name'] != "") {
  //   $image = $_FILES['file']['name'];
  //   $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
  //   $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "img/books/";
  //   $uploadDirectory .= $image;
  //   move_uploaded_file($_FILES['file']['tmp_name'], $uploadDirectory);
  // }

  $q = "INSERT INTO books (book_isbn, book_title, book_author, book_image, book_descr, book_price) 
        VALUES ('$isbn', '$title', '$author', '$image', '$descr', '$price')";

  // $query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Can't add new data " . mysqli_error($conn);
    exit;
  } else {
    header("Location: viewbooks.php");
  }
}
?>

<main role="main" class="col-md-qw ml-sm-auto col-lg-10 pt-1 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

    <form method="post" action="add_book.php" enctype="multipart/form-data">
      <h1 class="display-1">Add Book</h1>

      <table class="table">
        <tr>
          <th>ISBN</th>
          <td><input type="text" name="isbn"></td>
        </tr>
        <tr>
          <th>Title</th>
          <td><input type="text" name="title" required></td>
        </tr>
        <tr>
          <th>Author</th>
          <td><input type="text" name="author" required></td>
        </tr>
        <tr>
          <th>Image</th>
          <td><input type="file" name="image"></td>
        </tr>
        <tr>
          <th>Description</th>
          <td><textarea name="descr" cols="40" rows="5"></textarea></td>
        </tr>
        <tr>
          <th>Price</th>
          <td><input type="text" name="price" required></td>
        </tr>
      </table>
      <input type="submit" name="add" value="Add new book" class="btn btn-success">
      <input type="reset" value="cancel" class="btn btn-default">
    </form>
    <br />
  </div>
</main>

</body>

</html>