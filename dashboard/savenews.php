<?php
	include'../engine/conn.php';
	session_start();
	if (isset($_SESSION['cravinkuname'])) {
		if (isset($_POST['id'])&&isset($_POST['uname']) &&isset($_POST['rrr'])&&isset($_POST['tit'])) {
			$id=$_POST['id'];
			$uname=$_POST['uname'];
			$post=$_POST['rrr'];
			$head=$_POST['tit'];
			$post=str_replace("'","''",$post);

			$del="UPDATE news set head='$head', news='$post' WHERE id=$id and uploader='$uname'";
			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
				echo "SUCCESS";
			}
			else{
				echo (mysqli_error($conn));
			}
		}
	}
	else{
		header('Location:index.php');
	}

?>