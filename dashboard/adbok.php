<?php
include '../engine/conn.php';
session_start();
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

if (isset($_POST['add'])) {
  $isbn = sanitize($_POST['isbn']);
  $isbn = mysqli_real_escape_string($conn, $isbn);

  $title = sanitize($_POST['title']);
  $title = mysqli_real_escape_string($conn, $title);

  $author = sanitize($_POST['author']);
  $author = mysqli_real_escape_string($conn, $author);

  $descr = sanitize($_POST['descr']);
  $descr = mysqli_real_escape_string($conn, $descr);

  $link = sanitize($_POST['link']);
  $link = mysqli_real_escape_string($conn, $link);

  $price = floatval(sanitize($_POST['price']));
  $price = mysqli_real_escape_string($conn, $price);
  
  $listprice = floatval(sanitize($_POST['list_price']));
  $listprice = mysqli_real_escape_string($conn, $listprice);

  // add image
  if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $image = $_FILES['image']['name'];
    $target = "../img/books/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
  }

  $imageeee = empty($image) ? 'default.jpg' : $image;

  $a = "SELECT * FROM register WHERE username = '$cravinkuname'";
  $b = mysqli_query($conn, $a);
  $c = mysqli_fetch_assoc($b);
  $d = $c['id'];

  $query = "INSERT INTO books (id, book_isbn, book_title, book_author, book_image, book_descr, book_price, list_price, purchase_link) 
        VALUES ('$d', '$isbn', '$title', '$author', '$imageeee', '$descr', '$price', '$listprice', '$link')";

  // $query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Can't add new data " . mysqli_error($conn);
    exit;
  } else {
    header("Location: viewbooks.php");
  }
}
