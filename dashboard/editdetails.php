<?php
	include'../engine/conn.php';
	session_start();
	if (isset($_SESSION['cravinkuname'])) {
		if (isset($_POST['fname'])&&isset($_POST['uname']) &&isset($_POST['phone'])&&isset($_POST['address'])&&isset($_POST['email'])&&isset($_POST['country'])) {
			$uname=$_POST['uname'];
			$fname=$_POST['fname'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$email=$_POST['email'];
			$funame=$_SESSION['cravinkuname'];
			

			$del="UPDATE register set username='$uname', name='$fname',email='$email',phone='$phone', address='$address' WHERE username ='$funame'";
			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
				$sel="UPDATE posts set uploader='$uname' WHERE uploader='$funame'";
				$rsel=mysqli_query($conn,$sel);
				$nel="UPDATE news set uploader='$uname' WHERE uploader='$funame'";
				$nsel=mysqli_query($conn,$nel);
				if ($rsel&&$nsel) {
					echo "SUCCESS";					
				}
				else{
				echo (mysqli_error($conn));
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