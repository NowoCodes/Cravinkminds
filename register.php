<?php
session_start(); 
$page = 'register'; 
$title = 'Sign Up - CravinkMinds';
$description = 'sign up and join our amazing writing hub';

include 'engine/conn.php';

if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($link, $_POST['fname']);
	 $email = mysqli_real_escape_string($link, $_POST['email']);
	 $address = mysqli_real_escape_string($link, $_POST['address']);
	 $country = mysqli_real_escape_string($link, $_POST['country']);
	 $phone = mysqli_real_escape_string($link, $_POST['phone']);
	 $username = mysqli_real_escape_string($link, $_POST['uname']);
	 $password = mysqli_real_escape_string($link, $_POST['password']);
	  $password = md5($password);//encrypt the password before saving in the database
$sql="select * from register where email='$email'";
$res=mysqli_query($link,$sql);
if (mysqli_num_rows($res) > 0) {

        $_SESSION['message'] ="<div class='alert text-center alert-danger'>Email already exist, kindly login.</div>";
		header("location:login.php");
		exit();

} else { 
$token = uniqid(md5(time()));

         $sql = "INSERT INTO register (name, username, email, address, country, phone, password, token, verify)
                SELECT  '$name', '$username', '$email', '$address', '$country', '$phone', '$password', '$token', '0'
                FROM DUAL
                WHERE NOT EXISTS (SELECT email FROM register WHERE email = '$email') LIMIT 1;";




	 	mysqli_query($link, $sql);
	 		ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
   
    $encoding = "utf-8";
    $url = "https://cravinkminds.com/verify.php?token=$token";
    $from = "info@cravinkminds.com";
    
    $name = mysqli_real_escape_string($link, $_POST['fname']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$address = mysqli_real_escape_string($link, $_POST['address']);
	$country = mysqli_real_escape_string($link, $_POST['country']);
	$phone = mysqli_real_escape_string($link, $_POST['phone']);
    
    
    
    
    //admin mail
    $admin ="admin@cravinkminds.com";
    $subject2 = "NEW STUDENT REGISTRATION";
    $message2 ="Hello my name is $name, I'm from $country, my address is $address, $email is my email address & my phone number is $phone";
    //admin mail end
    
    //students mail
    $to = $email = mysqli_real_escape_string($link, $_POST['email']);
    $subject = "ACCOUNT VERIFICATION";
    $message ="Hello $name, your account has been created. We are glad you choose to join us, CravinkMinds, where your journey to great writing starts.";
    $message .= ' Account verification link: ';
    $message .= '' . $url . '';
    //students mail end
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header = "Content-type: text/html; charset=".$encoding." \r\n";
    $headers = "From:" . $from;
    $headers = 'From: CravinkMinds <info@cravinkminds.com>' . PHP_EOL .
    'Reply-To: CravinkMinds <info@cravinkminds.com>' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
    
   
    mail($to,$subject,$message,$headers,"-f ".$from);//student mail 
    mail($admin,$subject2,$message2,$headers,"-f ".$from);//admin notification
  
		$_SESSION['message'] ="<div class='alert text-center alert-success'>Account created. Please check your email for verification link.</div>";
		header("location:login.php");
		exit();

	 }

}//end


?>
<?php include 'lognav.php'; ?>

<body class="bg">


  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! style.css -->
          </div>
          <div class="card-body">


<nav class="text-center mb-5 ">


<a href="login.php">
<span class="not text-center lin">
<img class="svg" src='img/profile-user.svg'><br>LOGIN
</span>
</a>


<a class="act text-white" href="register.php">
<span class="text-center lin">      
<img src='img/edit.svg' ><br>RESGISTER
</span>
</a>

<a class="hove" href="forgot.php">
<span class="not text-center lin">
<img src='img/lock.svg'><br>PASSWORD
</span>
</a>


</nav>

<?php if (isset($msg)) { echo $msg; }  ?>






                <form class="form-signin" autocomplete="off" method="post" enctype="multipart/form-data">
                <div class="container">
                	<hr>
                 <div class="row">
                 <div class="col-sm">


                 <div class="form-label-group">
                 <input type="text" id="fname" name="fname" class="form-control" placeholder="Username" required autofocus>
                 <label for="fname">Full Name</label>
                 </div>


                 </div>
                <div class="col-sm">
                <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
                <label for="email">Email address</label>
                </div>
                </div>
                </div>

            
              <hr>

             
               <div class="row">
               <div class="col-sm">


                <div class="form-label-group">
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
                <label for="address">Address</label>
                </div>


                </div>
                <div class="col-sm">
                <div class="form-label-group">
                <input type="text" id="country" name="country" class="form-control" placeholder="Email address" required>
                <label for="country">Country</label>
                </div>
                </div>
                </div>



                <div class="form-label-group">
                <input type="tel" id="phonenumber" name="phone" class="form-control" placeholder="Phone Number" required>
                <label for="phonenumber">Phone Number</label>
                </div>


                 <hr>


                <div class="row">
                <div class="col-sm">

                <div class="form-label-group">
                <input type="text" id="username" name="uname" class="form-control" placeholder="Username" required>
                <label for="username">Username</label>
                </div>                
                </div>


                <div class="col-sm">

                <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
                </div>
                </div>
                </div>

                <button class="btn act text-white btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Register</button>
             
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