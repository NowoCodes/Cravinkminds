<?php  
include '../engine/conn.php';
if (isset($_POST['id'])&&isset($_POST['uname'])) {
	$id=$_POST['id'];
	$usname=$_POST['uname'];

	$del="DELETE from news WHERE id=$id and uploader='$usname'";
	$rdel=mysqli_query($conn,$del);
	if ($rdel) {
		echo "SUCCESS";
	}
	else{
		echo (mysqli_error($conn));
	}

}
?>