<?php
	include'../engine/conn.php';
	session_start();
	if (isset($_SESSION['cravinkuname'])) {
		if (isset($_POST['id'])&&isset($_POST['uname'])) {
			$id=$_POST['id'];
			$uname=$_POST['uname'];

			$sel="SELECT img from posts WHERE id=$id and uploader='$uname'";
			$rsel=mysqli_query($conn,$sel);
			$im=mysqli_fetch_assoc($rsel);
			$img=$im['img'];

			$del="UPDATE posts set img=NULL WHERE id=$id and uploader='$uname'";
			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
				unlink('../img/posts/'.$img);
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