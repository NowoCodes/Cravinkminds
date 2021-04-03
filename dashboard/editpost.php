<?php
$title = 'Edit Post - Cravinkminds';
$page = 'edit'; 
session_start();
include '../engine/conn.php';
if (isset($_SESSION['cravinkuname'])) {
	$cravinkuname=$_SESSION['cravinkuname'];

	if (isset($_GET['id'])) {
		$id=$_GET['id'];
	}
	else{
		header("Location:index.php");
	}
	
}
else{
	header("Location:../login.php");
};
 $sam="SELECT * FROM register where username='$cravinkuname'";
				$rsam=mysqli_query($conn,$sam);
				$gsam=mysqli_fetch_assoc($rsam);

				$primg=$gsam['primg'];
				$name=$gsam['name'];
				$uname=$gsam['username'];
				$email=$gsam['email'];
				$address=$gsam['address'];
				$phone=$gsam['phone'];
 include 'dashboard-nav.php' ?>
<?php include 'sidebar.php' ?>
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-4">

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	
	
	
		<div class="post" style="padding-top: 20px;">
			<h4 class="text-uppercase text-center"> Hello, <?php echo "$name" ?> edit your post</h4>
			<?php  
				$sel="SELECT * FROM posts WHERE uploader='$cravinkuname' and id=$id";
				$rsel=mysqli_query($conn,$sel);
				$gsel=mysqli_fetch_assoc($rsel);
				if (mysqli_num_rows($rsel)>0) {
				$id=$gsel['id'];
				$head=$gsel['head'];
				$post=$gsel['post'];
				$img=$gsel['img'];
				$uploader=$gsel['uploader'];
				
					echo "<div class='rpost text-center' id=$id uname=$cravinkuname>";
					echo "<h5>EDIT YOUR TITLE</h5>
					<input class='text-center hd' value='$head'> <br>";
						
					if ($img=='') {
						echo "<div class='imgu'>
								<p style='margin-bottom:5px; margin-top:0;'> Add a picture </p>
								<input type='file' style='margin-bottom: 10px;' class='adpic'> <button class='imup'>Upload</button><br>
							</div>";
					} 
				else{
					echo "<div class='imgu mb-3 text-center'>

					     <img src='../img/posts/$img' width='100%' height='auto' class='mb-3 container-fluid im' alt='$head'>
					    <br>


							<p style='margin-bottom:0px; margin-top:0px;' class=' pb-3'> Change picture </p>
							
						
                         <button class='btn hover  m-2 rmpic'> Remove Picture </button>


							<input type='file' class='btn container-fluid hover inline-flex 'style='padding: 5px; width:50%;' class='chpic'>


							<button class='btn hover imch'>Upload</button><br>
							
							</div>";

				}
				echo 		"<textarea class='pst' name='editor'>$post</textarea><br>
							<input type='submit' class='btn hover edsub' value='Submit'/>

							<input type='submit' class='btn hover back' value='Back'/>
							</div>";
					
				}
				else{
					echo "<p style='width:100%;'> The Article you are looking for does not exist </p>";
					echo "<a href='index.php'>Back</a>";
				}
			?>
			
		</div>

</div>
</main>
</div>
 <?php include '../scripts.php'; ?>
</body>
</html>