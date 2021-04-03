<?php  
include '../engine/conn.php';
if (isset($_POST['id'])&&isset($_POST['uname'])) {
	$id=$_POST['id'];
	$usname=$_POST['uname'];

	$del="DELETE from posts WHERE id=$id";
	$rdel=mysqli_query($conn,$del);
	if ($rdel) {
		echo "SUCCESS";
	}
	else{
		echo (mysqli_error($conn));
	}

}
?>