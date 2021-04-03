<?php
require'conn.php';  
if (isset($_POST['mail'])) {
	$mail=mysqli_escape_string($conn,$_POST['mail']);
	$ins="INSERT into subscribers (mail) values ('$mail')";
	$r_ins=mysqli_query($conn,$ins);
	if ($r_ins) {
		echo "SUCCESS";

	}
	else{
		header("Location:../index.php");
	};

}
else{
	if ($_SERVER['HTTP_REFERER']) {
		$back=$_SERVER['HTTP_REFERER'];
  	header('Location:$back');
  }	
}
?>