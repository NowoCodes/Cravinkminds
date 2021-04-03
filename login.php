<?php 
session_start();
$page = 'login'; 
$title = "Login - CravinkMinds";
$description = "Kindly login to your dashboard";

include("engine/conn.php");
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
  $query = "SELECT * FROM register WHERE email = '$email'";
    $run = mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0){
    $row = mysqli_fetch_assoc($run);
    $db_email = $row['email']; 
   if( ($db_email != $email));
  }else{
$msg = "<div class='alert text-center alert-danger'>User not found.</div>";
  }

  }


if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $password = mysqli_real_escape_string($conn,$_POST['password']); $password = md5($password);
   $query = "SELECT * FROM register WHERE email = '$email'";
      $run = mysqli_query($conn,$query);
      if(mysqli_num_rows($run)>0){
      $row = mysqli_fetch_array($run);
      $uname=$row['username'];
      $db_password = $row['password'];
      $db_email = $row['email'];
      $verify= $row['verify'];
      if($db_password==$password){
      if($verify==0){
    $msg = "<div class='alert text-center alert-danger'>Please verify your email.</div>";
  }else{
         $_SESSION['loggedin'] = 1;
         $_SESSION['cravinkuname']=$uname;
       header("location:dashboard");
       $msg = "<div class='alert text-center alert-danger'>User not found.</div>";
      }
   }else{
         $msg = "<div class='alert text-center alert-danger'>Incorrect email or password</div>";
      }
   }
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


<a href="login.php" class="act text-white" >
<span class=" text-center lin">
<img class="svg" src='img/profile-user.svg'><br>LOGIN
</span>
</a>


<a class="hove" href="register.php">
<span class="not text-center lin">      
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


<?php if (isset($_SESSION['message'])){ 
  echo $_SESSION['message'];
  unset($_SESSION['message']); 
}  ?>


                <form class="form-signin" method="post" enctype="multipart/form-data">

                 <hr>


                <div class="row">
                <div class="col-sm">

                <div class="form-label-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="email" required>
                <label for="email">email</label>
                </div>                
                </div>

                <div class="col-sm">

                <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
                </div>
                </div>
                </div>

                <button class="btn act text-white btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Login</button>
             
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