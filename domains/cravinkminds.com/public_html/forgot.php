<?php 
$page = 'forgot'; 
$title = "Forgot Password - CravinkMinds";
$description = "Forgotten your password?, reset your password now";
include 'header.php';
include 'engine/conn.php';

if (isset($_POST['submit'])) {
$email = mysqli_real_escape_string($conn, $_POST['email']); 
$query="select * from register where email='$email'";
$run=mysqli_query($conn,$query);
if (mysqli_num_rows($run) > 0) { 
  $row = mysqli_fetch_array($run);
  $db_email = $row['email'];
  $db_id = $row['id'];
  $token = uniqid(md5(time()));
  $query = "INSERT INTO password (email, token)
                SELECT  '$email','$token' ;";

            if(mysqli_query($conn, $query)){
      $encoding = "utf-8";
      $to = $email;
      $from = 'test@smlti.org';
      $subject = "Password reset link";
      $message = "We recieved a password reset request. The link to reset your password is below, https://cravinkminds.com/reset.php?token=$token click to rest your password.";// change url to your url
      $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $header = "Content-type: text/html; charset=".$encoding." \r\n";
            $headers = "From:" . $from;
            $headers = 'From: CravinkMinds <info@cravinkminds.com>' . PHP_EOL .//your email
            'Reply-To: CravinkMinds <info@cravinkminds.com>' . PHP_EOL .//your email
            'X-Mailer: PHP/' . phpversion();
          mail($to,$subject,$message,$headers,"-f ".$from);
      $msg = "<div class='alert text-center alert-success'>Password reset link has been sent to your email.</div>";
    }
  }else{
    $msg ="<div class='alert text-center alert-danger'>User not found.</div> ";
   }

}

?>

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
                <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
                <label for="email">Email address</label>
                </div>                
            


                <button class="btn act text-white btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">RESET PASSWORD</button>
             
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