<?php
	include'../engine/conn.php';
	session_start();
	if (isset($_SESSION['cravinkuname'])) {
		if (isset($_POST['id'])&&isset($_POST['uname'])&&isset($_FILES['file'])) {
			$id=$_POST['id'];
			$uname=$_POST['uname'];
			$post=$_FILES['file']['name'];
			$img=$_FILES['file']['tmp_name'];
			$imgname=$uname.$id.$post;

			$del="UPDATE news set img='$imgname' WHERE id=$id and uploader='$uname'";
			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
				if(move_uploaded_file($img,'../img/news/'.$imgname)){
					echo 'S'.$imgname;
				}
				else{
					echo "Error!";
				}
				

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