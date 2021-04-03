<?php
include '../engine/conn.php';
session_start();
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

include 'dashboard-nav.php';


if (isset($_POST['add'])) {
  $isbn = trim($_POST['isbn']);
  $isbn = mysqli_real_escape_string($conn, $isbn);

  $title = trim($_POST['title']);
  $title = mysqli_real_escape_string($conn, $title);

  $author = trim($_POST['author']);
  $author = mysqli_real_escape_string($conn, $author);

  $descr = trim($_POST['descr']);
  $descr = mysqli_real_escape_string($conn, $descr);

  $price = floatval(trim($_POST['price']));
  $price = mysqli_real_escape_string($conn, $price);

  // add image
  if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $image = $_FILES['image']['name'];
    $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "img/books/";
    $uploadDirectory .= $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
  }

  $query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Can't add new data " . mysqli_error($conn);
    exit;
  } else {
    header("Location: vbooks.php");
  }
}
?>
<form method="post" action="add_book.php" enctype="multipart/form-data">
  <table class="table">
    <tr>
      <th>ISBN</th>
      <td><input type="text" name="isbn"></td>
    </tr>
    <tr>
      <th>Title</th>
      <td><input type="text" name="title" required></td>
    </tr>
    <tr>
      <th>Author</th>
      <td><input type="text" name="author" required></td>
    </tr>
    <tr>
      <th>Image</th>
      <td><input type="file" name="image"></td>
    </tr>
    <tr>
      <th>Description</th>
      <td><textarea name="descr" cols="40" rows="5"></textarea></td>
    </tr>
    <tr>
      <th>Price</th>
      <td><input type="text" name="price" required></td>
    </tr>
  </table>
  <input type="submit" name="add" value="Add new book" class="btn btn-primary">
  <input type="reset" value="cancel" class="btn btn-default">
</form>
<br />

</body>

</html>




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