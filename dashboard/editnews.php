<?php  
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
}
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit News - Cravinkminds</title>
	<link rel="shortcut icon" href="../img/logo.png">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<style>
		*{
			box-sizing: border-box;
		}
		body{
			background-color: #F0F0F0;
			font-family: futura;
		}
		@font-face{
			font-family: lineawesome;
			src: url('../fonts/line-awesome.ttf');
			font-weight: lighter;
		}
		@font-face{
			font-family: futura;
			src: url('../fonts/futura.ttf');
			font-weight: lighter;
		}
		.logo{
			width:250px;
			text-align: center;
			padding-top: 5px;
		}
		.logo img{width:80%;}
		.toppane{
			position: fixed;
			width: 100%;
			top:0;
			left:0;
			height: 70px;
			background-color: dimgray;
			overflow: hidden;	
			box-shadow: 0 3px 8px rgba(0,0,0,0.4);
		}
		.primg{
			position: absolute;
			right: 30px;
			top: 20px;
			height: 30px;
			width:30px;
			cursor: pointer;
			border-radius: 50%;	
		}
		.container{
			z-index: -1;
			display:none;
			flex-wrap: wrap;
			height: auto;
			width: 90%;
			min-height: 100%;
			margin-top: 100px;
			box-sizing: border-box;
			text-align: center;
		}
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
	<div class="toppane">
		<div class="logo">
			<img src="../img/logo(2).png">		
		</div>
		<div class="controls">
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
				echo "<img class='primg drop' src='../img/profile/$primg' alt='$name'>";
	
			?> 
		</div>
	</div>
	<div class="container">
		<div class="post">
			<?php  
				$sel="SELECT * FROM news WHERE uploader='$cravinkuname' and id=$id";
				$rsel=mysqli_query($conn,$sel);
				$gsel=mysqli_fetch_assoc($rsel);
				if (mysqli_num_rows($rsel)>0) {
				$id=$gsel['id'];
				$head=$gsel['head'];
				$post=$gsel['news'];
				$img=$gsel['img'];
				$uploader=$gsel['uploader'];
				
					echo "<div class='rpost' id=$id uname=$cravinkuname>";
					echo "<h3>TITLE</h3> <input class='hd' value='$head'> <br>";
						
					if ($img=='') {
						echo "<div class='imgu'>
								<p style='margin-bottom:5px; margin-top:0;'> Add a picture </p>
								<input type='file' style='margin-bottom: 10px;' class='adnpic'> <button class='imnup'>Upload</button><br>
							</div>";
					} 
				else{
					echo "<div class='imgu'>
							<p style='margin-bottom:0px; margin-top:0px;'> Change picture </p>
							<input type='file' style='margin-bottom: 10px; margin-top:0px;' class='chnpic'> <button class='imnch'>Upload</button><br>
							<img src='../img/news/$img' width='200px' height='auto' class='nim' alt='$head'> <br>
							<button class='rmnpic'> Remove Picture </button> <br>
						</div>";

				}
				echo 		"<textarea class='pst' name='editor'>$post</textarea>
							<input type='submit' class='ednsub' value='Submit'/>

							<input type='submit' class='back' value='Back'/>
							</div>";
					
				}
				else{
					echo "<p style='width:100%;'> The Article you are looking for does not exist </p>";
					echo "<a href='index.php'>Back</a>";
				}
			?>
			
		</div>
	</div>

</body>
</html>