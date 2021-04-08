<?php

// include '../engine/conn.php';

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