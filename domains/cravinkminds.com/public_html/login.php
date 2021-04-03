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
<!------ Include the above in your HEAD tag ---------->
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="3b-posts.css"/>
    <meta name="theme-color" content="#42929d">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script>history.pushState({}, "", "")</script>
    
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