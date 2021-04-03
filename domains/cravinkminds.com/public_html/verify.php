<?php 
session_start();
include 'engine/conn.php';


if (isset($_GET['token'])) {
	$token =  mysqli_real_escape_string($link, $_GET['token']);

	$sql="select * from register where token='$token'";

	$res = mysqli_query($link,$sql);

	if (mysqli_num_rows($res)>0) {

		$row = mysqli_fetch_array($res);
		$id = $row['id'];

		$sql = "update register set verify='1', token='' where id= '$id'" ;

		mysqli_query($link,$sql);
		$_SESSION['message'] ="<div class='alert text-center alert-success'>Your account has been verified, Login Now.</div>";
		header("location:login.php");
	}else{
header("location:login.php");
	}
}else {
header("location:login.php");
}



 ?>