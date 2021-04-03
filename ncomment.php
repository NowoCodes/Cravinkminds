<?php 
include 'engine/conn.php';
if (isset($_POST['id'])&&isset($_POST['cravinkuname'])&&isset($_POST['comment'])) {
	$id=$_POST['id'];
	$uname=$_POST['cravinkuname'];
	$comment=$_POST['comment'];
	$time=time();
	$do="INSERT into news_comments (news_id,cravinkuname,comment,`time`) values('$id','$uname','$comment','$time')";
	$ddo=mysqli_query($conn,$do);
	if ($ddo) {
		echo "Success";
	}
	else{
		echo (mysqli_query($conn));
	}
}
else{
		echo "Failure";
	}
?>