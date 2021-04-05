<?php

$conn=mysqli_connect('localhost','root','','cravinkm_cravink');


/* MySQL server connection. */
$link = mysqli_connect("localhost", "root", "", "cravinkm_cravink");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

include '../functions/db_functions.php'; 

?>
