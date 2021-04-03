<?php
	include'../engine/conn.php';
	session_start();
	if (isset($_SESSION['cravinkuname'])) {
		if (isset($_POST['post'])&&isset($_POST['uname']) &&isset($_POST['title'])&&isset($_FILES['file'])) {
			$uname=$_POST['uname'];
			$post=$_POST['post'];
			$head=$_POST['title'];
			$post=str_replace("'","''",$post);
			$imgf=$_FILES['file']['name'];
			$img=$_FILES['file']['tmp_name'];
			$imgname=$uname.$imgf;
			$tt=time();

			$del="INSERT into posts (head,post,uploader,img,`time`)values('$head','$post','$uname','$imgname','$tt')";

			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
				if(move_uploaded_file($img,'../img/posts/'.$imgname)){
					$sel="SELECT id from posts where id=(SELECT LAST_INSERT_ID())";
					$rsel=mysqli_query($conn,$sel);
					$gsel=mysqli_fetch_assoc($rsel);
					$nid=$gsel['id'];
					echo "S".$nid;
				}
			}
			else{
				echo (mysqli_error($conn));
			}
		}
		else if(isset($_POST['post'])&&isset($_POST['uname']) &&isset($_POST['title'])) {
			$uname=$_POST['uname'];
			$post=$_POST['post'];
			$head=$_POST['title'];
			$post=str_replace("'","''",$post);
		
			$tt=time();

			$del="INSERT into posts (head,post,uploader,`time`)values('$head','$post','$uname','$tt')";
			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
					$sel="SELECT id from posts where id=(SELECT LAST_INSERT_ID())";
					$rsel=mysqli_query($conn,$sel);
					$gsel=mysqli_fetch_assoc($rsel);
					$nid=$gsel['id'];
					echo "S".$nid;
			}
			else{
				echo (mysqli_error($conn));
			}
		}
		else{
	        	header('Location:/dashboard/npost.php');
		}
	}
	else{
		header('Location:index.php');
	}

?>