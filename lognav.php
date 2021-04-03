<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content='<?php echo $description; ?>'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#42929d">
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
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="new-style.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo.png">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src='js/jquery-3.3.1.min.js'></script>
    <script type="text/javascript" src='js/clamp.js'></script>
     <script type="text/javascript" src='js/clamp.min.js'></script>
    <script type="text/javascript" src='js/post.js'></script>
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
            <!-- Navbar Brand -->
            <a href="index.php" class="navbar-brand"><img src="img/logo(2).png" width='120px'></a>
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
          <a class="nav-link active dropdown-toggle" href="#?events=" role="button" id="navbarDropdown" for="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
          <div  class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="adbook.php">AdBooks</a>
                 <a class="dropdown-item" href="poetry-workshop.php">Poetry Workshop</a>
                  <a class="dropdown-item" href="masterclass.php">Masterclass</a>
                 </div>
               </li>

  <?php } else { ?>

        <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#?events=" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="adbook.php">AdBooks</a>
                 <a class="dropdown-item" href="poetry-workshop.php">Poetry Workshop</a>
                  <a class="dropdown-item" href="masterclass.php">Masterclass</a>
                 </div>
               </li>
  <?php } ?>

            </ul>
            
            <div class="navbar-text"><a href="#1" class="search-btn"><i class="icon-search-1"></i></a></div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="navbar-item mt-2"><a href="dashboard"><span class="material-icons">login</span></a></div>

          </div>
        </div>
      </nav>
      


    </header>