<?php

// include '../engine/conn.php';
function db_connect(){
  $conn=mysqli_connect('localhost','root','','cravinkm_cravink');
  if(!$conn){
    echo "Can't connect database " . mysqli_connect_error($conn);
    exit;
  }
  return $conn;
}

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

function getbookprice($isbn){
  $conn = db_connect();
  $query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "get book price failed! " . mysqli_error($conn);
    exit;
  }
  $row = mysqli_fetch_assoc($result);
  return $row['book_price'];
}

function getBookByIsbn($conn, $isbn){
  $query = "SELECT book_title, book_author, book_price FROM books WHERE book_isbn = '$isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  return $result;
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

function sanitize($dirty){
  return htmlentities($dirty, ENT_QUOTES, "UTF-8");
  // return htmlentities($dirty, ENT_HTML5, "UTF-8"); 
  return trim($dirty);
  return stripslashes($dirty);
  return htmlspecialchars($dirty);
}

function pretty_date($date) {
  date_default_timezone_set("Africa/Lagos");
  return date("M d, Y h:i A", strtotime($date));
}

function display_errors($errors){
  $display = '<ul class="container-fluid mx-5 list-unstyled ">';
  foreach ($errors as $error){
      $display .= '<li class="text-danger">'.$error.'</li>';
  }
  $display .= '</ul>';
  return $display;
}