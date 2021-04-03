<?php
$title = 'Create New Post';
$page = 'npost';  
session_start();
include '../engine/conn.php';
if (isset($_SESSION['cravinkuname'])) {
	$cravinkuname=$_SESSION['cravinkuname'];	
}
else{
	header("Location:../login.php");
}

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
  <script type="text/javascript" src="js/npost.js"></script>

<?php include 'sidebar.php' ?>




<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
 
	<form method="post" style="padding-top: 20px;" action="newpost.php" class="post">
		<div class="post">
			<h4 class="text-uppercase text-center"> Hello, <?php echo "$name" ?> write your post</h4>
					<div class='rpost' uname=<?php echo $cravinkuname;?>>
					<h5 class="text-center">ENTER YOUR POST TITLE</h5>
					<input class='hd text-center'> <br>
					<div class='imgu'>
							<p style='margin-bottom:5px; margin-top:0;'> Add a picture </p>
							<input type='file' style='margin-bottom: 10px;' class='adnpic'> <br>
					</div>
			
				
					<textarea class='pst' name='editor'></textarea><br>
					<div class="text-center">
					<input type='submit' class='btn hover ednnsub' value='Submit'/>
          <a type='submit' class='btn hover text-white back' value='Back'>Back</a>
					 </div>
					</div>
			
		</div>
	</form>
	</div>
	</main>
</div>
 <?php include '../scripts.php'; ?>
</body>
</html>