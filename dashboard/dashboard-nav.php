<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="../img/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
    <meta name="theme-color" content="#053a42">
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="../css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="../vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" type="text/css" href="../new-style.css">
    <!-- Favicon-->
    <link rel="icon" href="img/logo.png" type="image/x-icon">  
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="icon" href="img/logo.png">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script type="text/javascript" src='../js/clamp.js'></script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src='../js/jquery-3.3.1.min.js'></script>
    <script type="text/javascript" src='../js/clamp.js'></script>
     <script type="text/javascript" src='../js/clamp.min.js'></script>
    <script type="text/javascript" src='../js/post.js'></script>
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

  <script type="text/javascript" src="js/index.js"></script>
	
  <script src="ckeditor/ckeditor.js"></script>
	
</head>
<body>
  
  <header class="header" style="margin-bottom:95px;">
      <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg" style=" position: fixed; top: 0; width: 100%;">
        
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand -->
            <a href="index.php" class="navbar-brand"><img src="../img/logo(2).png" width='120px' ></a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                <span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
              
              
            <ul class="navbar-nav ml-auto">

  <?php if ($page == 'post') { ?><li class="nav-item"><a href="../post.php" class="nav-link active">View Posts</a></li>
  <?php } else { ?><li><a href="../post.php" class="nav-link ">Posts</a></li><?php } ?>


  <?php if ($page == 'npost') { ?><li class="nav-item"><a href="npost.php" class="nav-link active">Create Post</a></li>
  <?php } else { ?><li><a href="npost.php" class="nav-link ">Create Post</a></li><?php } ?>

  <?php if ($page == 'viewbooks') { ?><li class="nav-item"><a href="viewbooks.php" class="nav-link active">View Books</a></li>
  <?php } else { ?><li><a href="viewbooks.php" class="nav-link ">View Books</a></li><?php } ?>


<?php if ($page == 'news') { ?><li class="nav-item"><a href="../news.php" class="nav-link active">News</a></li>
  <?php } else { ?><li><a href="../news.php" class="nav-link ">News</a></li><?php } ?>


<?php if ($page == 'nnews') { ?><li class="nav-item"><a href="nnews.php" class="nav-link active">Create News</a></li>
  <?php } else { ?><li><a href="nnews.php" class="nav-link ">Create News</a></li><?php } ?>




              <li class="nav-item dropdown">

            <div class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo "<img class='avatar' src='../img/profile/$primg' alt='$name'>"; ?> </div>
              
                <div  class="dropdown-menu" aria-labelledby="navbarDropdown">
                  

                 <a class="dropdown-item d-xl-none details" href="#?details.php" >Edit Credentials</a>
                 <a class="dropdown-item" href="../index.php">Home Page</a>
                 <a class="dropdown-item" href="../logout.php">Logout</a>

                  
                 </div>
               </li>



            </ul>


          </div>
        </div>
      </nav>


    <style>
   
     
  @media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}   
      


.sidebar {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width:100%;
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}


    </style>

    </header>