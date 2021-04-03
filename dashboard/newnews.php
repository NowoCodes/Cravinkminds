<?php
/*	include'../engine/conn.php';
	session_start();
	if (isset($_SESSION['cravinkuname'])) {
		if (isset($_POST['news'])&&isset($_POST['uname']) &&isset($_POST['title'])&&isset($_FILES['file'])) {
			$uname=$_POST['uname'];
			$news=$_POST['news'];
			$head=$_POST['title'];
			$news=str_replace("'","''",$news);
			$imgf=$_FILES['file']['name'];
			$img=$_FILES['file']['tmp_name'];
			$imgname=$uname.$imgf;
			$tt=time();
			$date=date('m/d/Y',$tt);

			$del="INSERT into news (head,news,uploader,img,`time`,`date`)values('$head','$news','$uname','$imgname','$tt','$date')";

			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
				if(move_uploaded_file($img,'../img/news/'.$imgname)){
					$sel="SELECT id from news where id=(SELECT LAST_INSERT_ID())";
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
	}
	else{
		header('Location:index.php');
	}

*/



	include'../engine/conn.php';
	session_start();
	if (isset($_SESSION['cravinkuname'])) {
		if (isset($_POST['news'])&&isset($_POST['uname']) &&isset($_POST['title'])&&isset($_FILES['file'])) {
			$uname=$_POST['uname'];
			$news=$_POST['news'];
			$head=$_POST['title'];
			$news=str_replace("'","''",$news);
			$imgf=$_FILES['file']['name'];
			$img=$_FILES['file']['tmp_name'];
			$imgname=$uname.$imgf;
			$tt=time();

			$del="INSERT into news (head,news,uploader,img,`time`)values('$head','$news','$uname','$imgname','$tt','$date')";

			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
				if(move_uploaded_file($img,'../img/news/'.$imgname)){
					$sel="SELECT id from news where id=(SELECT LAST_INSERT_ID())";
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
		else if(isset($_POST['news'])&&isset($_POST['uname']) &&isset($_POST['title'])) {
			$uname=$_POST['uname'];
			$news=$_POST['news'];
			$head=$_POST['title'];
			$news=str_replace("'","''",$news);
		
			$tt=time();

			$del="INSERT into news (head,news,uploader,`time`)values('$head','$news','$uname','$tt')";
			$rdel=mysqli_query($conn,$del);
			if ($rdel) {
					$sel="SELECT id from news where id=(SELECT LAST_INSERT_ID())";
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
	        	header('Location:nnews.php');
		}
	}
	else{
		header('Location:index.php');
	}

?>














?>