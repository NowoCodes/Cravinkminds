<?php
include '../engine/conn.php';
session_start();
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

if (isset($_POST['add'])) {
  $acc_name = sanitize($_POST['acc_name']);
  $acc_name = mysqli_real_escape_string($conn, $acc_name);

  $acc_no = sanitize($_POST['acc_no']);
  $acc_no = mysqli_real_escape_string($conn, $acc_no);

  $bank = sanitize($_POST['bank']);
  $bank = mysqli_real_escape_string($conn, $bank);

  $a = "SELECT * FROM register WHERE username = '$cravinkuname'";
  $b = mysqli_query($conn, $a);
  $c = mysqli_fetch_assoc($b);
  $d = $c['id'];

  $query = "INSERT INTO bank_account (user_id, acc_name, acc_no, bank)
  VALUES ('$d', '$acc_name', '$acc_no', '$bank')";

  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Can't add new data " . mysqli_error($conn);
    exit;
  } else {
    header("Location: viewbooks.php");
  }
}
