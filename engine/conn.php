<?php

$conn=mysqli_connect('localhost','root','','cravinkm_cravink');


/* MySQL server connection. */
$link = mysqli_connect("localhost", "root", "", "cravinkm_cravink");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

include '../functions/db_functions.php'; 

session_start();

if (isset($_SESSION['success'])) {
    echo '<div class="container alert alert-success alert-dismissible fade show">';
    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    echo '<li class="text-success list-unstyled">'.$_SESSION['success'].'</li>';
    echo '</div>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="container alert alert-danger alert-dismissible fade show">';
    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    echo '<li class="text-danger list-unstyled">'.$_SESSION['error'].'</li>';
    echo '</div>';
    unset($_SESSION['error']);
}

?>
