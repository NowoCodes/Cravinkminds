<?php  
session_start();
$title = 'Create New Post';
$page = 'dashboard';
include '../engine/conn.php';
if (isset($_SESSION['cravinkuname'])) {
	$cravinkuname=$_SESSION['cravinkuname'];	
}
else{
	header("Location:../login.php");
}
?>
<?php 
 $sam="SELECT * FROM register where username='$cravinkuname'";
        $rsam=mysqli_query($conn,$sam);
        $gsam=mysqli_fetch_assoc($rsam);

        $primg=$gsam['primg'];
        $name=$gsam['name'];
        $uname=$gsam['username'];
        $email=$gsam['email'];
        $address=$gsam['address'];
        $phone=$gsam['phone'];
        $country=$gsam['country'];
        echo "<img class='primg drop' src='../img/profile/$primg' alt='$name'>";


include 'dashboard-nav.php' ?>

	<style>
		
		
		.post{
			width: 100%;
			height: auto;
		}
		.rpost{
			background-color: white;
			text-align: justify;
			padding: 10px;
			box-shadow: 0 2.8px 10px rgba(0,0,0,0.4);
			width: 100%;
			height: 100%;
			overflow: none;
		}
		.hd{
			width:auto;
			outline: none;
			border: 1px solid lightgrey;
			width: 100%;
			padding: 8px;
			border-top: 10px solid #E8E8E8;
			font-family: futura;
			font-size: 18px;
			letter-spacing: 1px;
			margin-bottom: 20px;
		}
		.rpost h3{
			margin-bottom: 5px;
		}
		.ednsub{
			background-color: #42919c;
			border-style: none;
			font-family: futura;
			padding: 8px;
			margin-top: 10px;
			cursor: pointer;	
		}
		.back{
			background-color: lightgrey;
			border-style: none;
			font-family: futura;
			padding: 8px;
			margin-top: 10px;
			cursor: pointer;	
		}
		.back:hover{
			background: dimgray;
		}
		.imnup, .imnch{
			background-color: #42919c;
			border-style: none;
			font-family: futura;
			padding: 5px;
			margin-top: 10px;
			cursor: pointer;	
		}
		.adnpic, .chnpic{
			border: 1px solid lightgrey;
			border-radius: 5px;
		}
		.imgu{
			z-index: -1;
		}
		.imgu img{
			width: 200px;
			height: auto; 
			margin-bottom: 10px;
		}
		
	</style>
</head>
<body>
	
	<form method="post" action="newpost.php" class="container" style="padding-top: 20px;">
		<div class="post">
			<h3 class=" text-center"> Hello, <?php echo "$name" ?> write your post</h3>
					<div class='rpost' uname='<?php echo $cravinkuname;?>'>
					<h3 class="text-center">TITLE</h3> <input class='text-center hd' placeholder="Enter Your Title"> <br>
					<div class=' text-center imgu'>
							<p style='margin-bottom:5px; margin-top:0;'> Add a picture </p>
							<input type='file' style='margin-bottom: 10px;' class='adnpic'> <br>
					</div>
			
				
					<textarea class='pst' name='editor'></textarea>
					<input type='submit' class='ednnsub' value='Submit'/>

					<input type='submit' class='back' value='Back'/>
					</div>
			
		</div>
	</form>
    <?php include '../scripts.php'; ?>
</body>
</html>