<?php 
session_start();
$page = 'reset'; 
$title = "Password Reset-CravinkMinds";
$description = "Reset your password";

include 'engine/conn.php';

if (isset($_GET['token'])) {
	$token = mysqli_real_escape_string($link, $_GET['token']);
	$sql = "select * from password where token ='$token'";
	$res = mysqli_query($link,$sql);
	if(mysqli_num_rows($res)>0){
		$row = mysqli_fetch_array($res);
		$token = $row['token'];
		$email = $row['email'];
	}else{
        $_SESSION['message'] ="<div class='alert text-center alert-success'>Password Updated, Login Now.</div>";
		header("location:login.php");
		exit();
	}
}



if (isset($_POST['resetpassword'])){
	
	 $password = mysqli_real_escape_string($link, $_POST['password']);
	 $confirmpassword = mysqli_real_escape_string($link, $_POST['confirmpassword']);
      $hashed = md5($password);

	 if($password!=$confirmpassword){
   $msg = "<div class='alert text-center alert-danger'>Password did not matched.</div>";

	 }elseif(strlen($password)<6){
	 	$msg = "<div class='alert text-center alert-danger'>Password must be 6 characters long.</div>";
	 }else{

	 	$sql = "update register set password='$hashed' where email='$email'";
	 	mysqli_query($link, $sql);


	 	$sql = "delete from password where email='$email'";

	 	    $encoding = "utf-8";

	 	    $to = $email = mysqli_real_escape_string($link, $_POST['email']);
			$from = 'info@cravinkminds.com';//your email
			$subject = "NEW PASSWORD SUCCESSFUL";
			$message = "Your request to update your password was successful.";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $header = "Content-type: text/html; charset=".$encoding." \r\n";
            $headers = "From:" . $from;
            $headers = 'From: CravinkMinds <info@cravinkminds.com>' . PHP_EOL .//your email
            'Reply-To: CravinkMinds <info@cravinkminds.com>' . PHP_EOL .//your email
            'X-Mailer: PHP/' . phpversion();
            
           mail($to,$subject,$message,$headers,"-f ".$from);


	 	mysqli_query($link,$sql);
        $_SESSION['message'] ="<div class='alert text-center  alert-success'>Password Updated, Login Now.</div>";
		header("location:login.php");
	exit();}

	}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content='<?php echo $description; ?>'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes
    <link rel="stylesheet" href="css/custom.css">-->
    <link rel="stylesheet" type="text/css" href="style.css">



<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="3b-posts.css"/>
    <meta name="theme-color" content="#42929d">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script>history.pushState({}, "", "")</script>
    <script type="text/javascript" src='js/jquery-3.3.1.min.js'></script>
    <script type="text/javascript" src='js/clamp.js'></script>
     <script type="text/javascript" src='js/clamp.min.js'></script>
    <script type="text/javascript" src='js/post.js'></script>
    <script src="3c-posts.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/reglog.js"></script>
  <script type="text/javascript" src="js/regval.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
    <script src='js/post.js'></script>
    <script src='js/index.js'></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="#">
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="index.php" class="navbar-brand"><img src="img/logo(2).png" width='120px'></a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>

          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">


  <?php if ($page == 'index') { ?><li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
  <?php } else { ?><li><a href="index.php" class="nav-link ">Home</a></li><?php } ?>




  <?php if ($page == 'post') { ?><li class="nav-item"><a href="post.php" class="nav-link active">Posts</a></li>
  <?php } else { ?><li><a href="post.php" class="nav-link ">Posts</a></li><?php } ?>


  <?php if ($page == 'news') { ?><li class="nav-item"><a href="news.php" class="nav-link active">News</a></li>
  <?php } else { ?><li><a href="news.php" class="nav-link ">News</a></li><?php } ?>



  <?php if ($page == 'books') { ?><li class="nav-item"><a href="books.php" class="nav-link active">Books</a></li>
  <?php } else { ?><li><a href="books.php" class="nav-link ">Books</a></li><?php } ?>



  <?php if ($page == 'events') { ?>

        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#1" role="button" id="navbarDropdown" for="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
          <div  class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="adbook.php">AdBooks</a>
                 <a class="dropdown-item" href="poetry-workshop.php">Poetry Workshop</a>
                  <a class="dropdown-item" href="masterclass.php">Masterclass</a>
                 </div>
               </li>

  <?php } else { ?>

        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="adbook.php">AdBooks</a>
                 <a class="dropdown-item" href="poetry-workshop.php">Poetry Workshop</a>
                  <a class="dropdown-item" href="masterclass.php">Masterclass</a>
                 </div>
               </li>
  <?php } ?>
             </ul>


            <div class="navbar-text"><a href="login.php" class="search-btn"><span class="material-icons">login</span></a></div>
            




          </div>
        </div>
      </nav>
    </header>

<body class="bg">


  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">


<nav class="text-center mb-5 ">


<a href="login.php">
<span class="not text-center lin">
<img class="svg" src='img/profile-user.svg'><br>LOGIN
</span>
</a>


<a class="hove" href="register.php">
<span class="not text-center lin">      
<img src='img/edit.svg' ><br>RESGISTER
</span>
</a>

<a class="act text-white"  href="forgot.php">
<span class=" text-center lin">
<img src='img/lock.svg'><br>PASSWORD
</span>
</a>


</nav>

<?php if (isset($msg)) { echo $msg; }  ?>



          <form class="form-signin" method="post" enctype="multipart/form-data">

                <div class="container">
                 <hr>


                 <div class="form-label-group ">
                <input type="email" id="email" class="form-control text-center" value="<?php echo $email; ?>" placeholder="Your Email" readonly disabled>
                <label for="email" class="text-center">Your Email</label>
                </div> 

                <div class="form-label-group">
                <input type="password" id="NewPassword" name="password" placeholder="New Password" class="form-control" required>
                <label for="NewPassword">New Password</label>
                </div>  

                <div class="form-label-group">
                <input type="password" id="ConfirmPassword" name="confirmpassword" placeholder="Confirm Password" class="form-control" required>
                <label for="ConfirmPassword">Confirm Password</label>
                </div> 

                             
            


                <button class="btn act text-white btn-lg btn-primary btn-block text-uppercase" name="resetpassword" type="submit">REST PASSWORD</button>
             
              <hr class="my-4">
              
            </div>

        </form>



    </div>
</div>
</div>
</div>
</div>

<!-- Page Footer-->
   <?php include 'footer.php'; 
   include 'scripts.php'; ?>
  
  
</body>
</body>
</html>