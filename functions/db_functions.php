<?php

include '../engine/conn.php';

function getBooks($conn) {
  $pquery = "SELECT * FROM register";
  $presult = mysqli_query($conn, $pquery);
  if($presult){
    $parray = mysqli_fetch_assoc($presult);
    $bookId = $parray['id'];
    return $bookId;
  } else {
    return null;
  }
}

function getPublisherId($conn, $bookId)
{
  $cquery = "SELECT * FROM books WHERE id = '$bookId'";
  $cresult = mysqli_query($conn, $cquery);
  // $carray = mysqli_fetch_assoc($cresult);
  return $cresult;
} 

function getAll($conn)
{
  $query = "SELECT * from books ORDER BY book_isbn DESC";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  return $result;
}
