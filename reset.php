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


<?php include 'lognav.php'; ?>
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