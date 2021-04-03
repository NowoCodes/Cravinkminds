<?php
$conn=mysqli_connect('localhost','root','','cravinkm_cravink');


/* MySQL server connection. */
$link = mysqli_connect("localhost", "root", "", "cravinkm_cravink");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function getAll($conn){
    $query = "SELECT * from books ORDER BY book_isbn DESC";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}
 

?>