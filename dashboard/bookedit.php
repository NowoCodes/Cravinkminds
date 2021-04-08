<?php
session_start();
include '../engine/conn.php';
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}
// if save change happen
if (!isset($_POST['save_change'])) {
  echo "Something wrong!";
  exit;
}

$isbn = sanitize($_POST['isbn']);
$title = sanitize($_POST['title']);
$author = sanitize($_POST['author']);
$descr = sanitize($_POST['descr']);
$link = sanitize($_POST['link']);
$price = floatval(sanitize($_POST['price']));
$listprice = floatval(sanitize($_POST['list_price']));

if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
  $image = $_FILES['image']['name'];
  $target = "../img/books/" . basename($image);
  move_uploaded_file($_FILES['image']['tmp_name'], $target);
}

$query = "UPDATE books SET
	book_title = '$title',
	book_author = '$author',
	book_descr = '$descr',
  purchase_link = '$link',
	book_price = '$price',
	list_price = '$listprice'";
if (isset($image)) {
  $query .= ", book_image = '$image' WHERE `book_isbn` = '$isbn'";
} else {
  $query .= " WHERE `book_isbn` = '$isbn'";
}
// two cases for file , if file submit is on => change a lot
$result = mysqli_query($conn, $query);
if (!$result) {
  echo "Can't update data " . mysqli_error($conn);
  exit;
} else {
  // header("Location: editbook.php?bookisbn=$isbn");
  header("Location: viewbooks.php");
}
