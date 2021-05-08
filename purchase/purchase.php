<?php
if ($_GET['status'] != 'success') {
  header("Location: javascript://history.go(-1)");
}
include '../engine/conn.php';
$book_id = $_GET['book_id'];
$query = "SELECT * FROM books WHERE id = '$book_id'";
$result = mysqli_fetch_assoc(mysqli_query($conn, $query));

// $url =
//   'https://contribute.geeksforgeeks.org/wp-content/uploads/gfg-40.png';

// // Use basename() function to 
// // return the file  
// $file_name = basename($url);

// // Use file_get_contents() function 
// // to get the file from url and use 
// // file_put_contents() function to 
// // save the file by using base name 
// if (file_put_contents(
//   $file_name,
//   file_get_contents($url)
// )) {
//   $alert = '<div class="alert alert-success alert-dismissible fade show">
//               <button type="button" class="close" data-dismiss="alert">&times;</button>
//               <strong>Success!</strong> Book Downloaded
//             </div>';
//   echo $alert;
// } else {
//   $alert = '<div class="alert alert-danger alert-dismissible fade show">
//               <button type="button" class="close" data-dismiss="alert">&times;</button>
//               <strong>Download Failed.</strong>
//             </div>';
//   echo $alert;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Download Book</title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->

  <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">


  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</head>
<body>
  <div class="container">
    <div class="navbar-header d-flex align-items-center justify-content-between">
      <!-- Navbar Brand -->
      <a href="../index.php" class="navbar-brand"><img src="../img/logo(2).png" width='120px'></a>
      <!-- Toggle Button-->
      <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
    </div>

    <h1 class="text-center py-5">Download Book</h1>
    <div class="row mb-5 pb-5">
      <div class="col-12 col-md-6 mb-5">
        <img class="img-fluid" src="../img/books/<?= $result['book_image']; ?>" height="500" width="500" alt="Book Image">
      </div>
      <div class="col-12 col-md-6">
        <h4 class="font-weight-bold">Title: <?= $result['book_title']; ?></h4>
        <h4 class="font-weight-bold">Author: <?= $result['book_author']; ?></h4>
        <h4 class="font-weight-bold">Description: <?= $result['book_descr']; ?></h4>
        <h4 class="font-weight-bold">Price: <?= $result['book_price']; ?></h4>
        <a class="text-decoration-none" href="books/<?= $result['ebook'] ?>" download="<?= $result['book_title']; ?>">
          <button class="btn btn-success btn-block"> Download </button>
        </a>
      </div>
    </div>
  </div>
</body>

</html>