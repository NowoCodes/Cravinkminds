<?php
	include'../engine/conn.php';
	session_start();
	if (isset($_SESSION['cravinkuname'])) {
		if (isset($_POST['uname'])&&isset($_FILES['file'])) {
			$uname=$_POST['uname'];
			$post=$_FILES['file']['name'];
			$img=$_FILES['file']['tmp_name'];
			$former=$_POST['former'];
			$imgname=$uname.$post;

			$del="UPDATE register set primg='$imgname' WHERE username='$uname'";
			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
				if((move_uploaded_file($img,'../img/profile/'.$imgname))&&unlink($former)){
					echo 'SUCCESS';
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