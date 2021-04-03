<?php  
require'../conn.php';
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	if (isset($_POST['cravinkuname'])) {
		$uname=$_POST['cravinkuname'];	
	}
	
	$sel="SELECT * from post_comments where post_id=$id";
	$rsel=mysqli_query($conn,$sel);
	if ($rsel) {
	while($gsel=mysqli_fetch_array($rsel)){
		$cravinkuname=$gsel['cravinkuname'];
		$comment=$gsel['comment'];

		if ($uname==$cravinkuname) {
			//echo "<p>$comment <span class='delcomm'>Delete Comment </span></p>";
		}
		else{
			//echo "<p>$comment</p>";	
		}
	}
		
	}
	else{
		//echo "No Comments";

	}
}
?>