<?php
// $conn=mysqli_connect('localhost','cravinkm_cravink','D61CVOlwfV74ZlS1o','cravinkm_cravink');


/* MySQL server connection. */
$link = mysqli_connect("localhost", "root", "", "cravinkm_cravink");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

?>