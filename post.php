<?php
session_start();
$page = 'post'; 
$title = 'Post - CravinkMinds';
$description = 'Get the latest-posts updates';  
include 'engine/conn.php';
?>
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
    <link rel="stylesheet" type="text/css" href="style.css">
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
            
            <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="navbar-item mt-2"><a href="dashboard"><span class="material-icons">login</span></a></div>

          </div>
        </div>
      </nav>
      


    </header>
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row ux">
              <!-- post -->

              <?php
              include 'engine/conn.php';
              if (isset($_GET['search'])) {
                $quer=$_GET['search'];
                $query=trim($quer);
              
                $pp="SELECT *  FROM posts where head or post like '%$query%' ORDER BY `time` DESC";
                 $rpp=mysqli_query($conn,$pp);
                 $months=['January','February','March','April','May','June','July','August','September','October','November','December'];
                 $cp=mysqli_fetch_array($rpp);
                 if (is_array($cp)) {
                   while ($gpp=mysqli_fetch_array($rpp)) {
                  $id=$gpp['id'];
                  $categories=$gpp['categories'];
                  $head=$gpp['head'];
                  $post=$gpp['post'];
                  $uploader=$gpp['uploader'];
                  $img=$gpp['img'];
                  $d=$gpp['time'];
                  $comments=mysqli_query($conn,"SELECT COUNT(id) as total FROM post_comments WHERE post_id=$id");
                  $mment=mysqli_fetch_assoc($comments);
                  $comment=$mment['total'];
                  $que="SELECT primg from register where username='$uploader'";
                  $rque=mysqli_query($conn,$que);
                  $gque=mysqli_fetch_row($rque);
                  $primg=$gque[0];
                  $da=date("Y/m/d",$d);
                  $y=substr($da, 0,4);
                  $m=$months[substr($da, 5,2)-1];
                  $dat=substr($da, 8,2);
                  $dateca=(time()-$d)/3600;
                  if ($dateca<24) {
                    $datecal=round($dateca).' hours ago';
                  }
                  elseif ($dateca>=24 and $dateca<168) {
                    $datecal=floor($dateca/24).' days ago';
                  }
                  elseif ($dateca>=168 and $dateca<672) {
                      $datecal=floor($dateca/168).' weeks ago';
                  }
                  elseif ($dateca>=672 and $dateca<8064) {
                      $datecal=floor($dateca/672).' months ago';
                  }
                  elseif ($dateca>=8064) {
                    $datecal=floor($dateca/8064).' years ago';
                  }
                  
                  echo "<div class='post col-xl-6 sux'>";
                  if ($img=='') {
                  echo "<div class='post-details'>
                        <div class='post-meta d-flex justify-content-between'>
                        <div class='date meta-last'>$dat $m | $y</div></div>    
                        <a href='posts.php?id=$id'><h3 class='h4'>$head</h3></a>
                        <div class='text-mutedd'>$post</div>
                        <footer class='post-footer d-flex align-items-center'><a href='user.php?name=$uploader' class='author d-flex align-items-center flex-wrap'>
                        <div class='avatar'><img src='img/profile/$primg' alt='...'' class='img-fluid'></div>
                        <div class='title'><span>$uploader</span></div></a>
                      <div class='date'><i class='icon-clock'></i> $datecal</div>
                      <div class='comments meta-last'><i class='icon-comment'></i>$comment</div>
                    </footer>
                  
                  </div>
                  </div>
                  ";}

                  
                  else{
                    echo " <div class='post-thumbnail'><a href='posts.php?id=$id'><img src='img/posts/$img' alt='...'' class='img-fluid'></a></div>
                      <div class='post-details'>
                        <div class='post-meta d-flex justify-content-between'>
                        <div class='date meta-last'>$dat $m | $y</div></div>    
                        <a href='posts.php?id=$id'><h3 class='h4'>$head</h3></a>
                        <div class='text-muted'> $post</div>
                        <footer class='post-footer d-flex align-items-center'><a href='user.php?name=$uploader' class='author d-flex align-items-center flex-wrap'>
                        <div class='avatar'><img src='img/profile/$primg' alt='...'' class='img-fluid'></div>
                        <div class='title'><span>$uploader</span></div></a>
                      <div class='date'><i class='icon-clock'></i>$datecal</div>
                      <div class='comments meta-last'><i class='icon-comment'></i>$comment</div>
                    </footer>
                  
                  </div>
                  </div>
                    ";
                  };}}
              
                 
                 else{
                  echo "<p>Nothing matches your search<br><a href='post.php'>All Posts</a></p>";
                 }
              }
                
              else{
              if (isset($_GET['pg'])) {
                        $pg=$_GET['pg'];
                        if ($pg==1) {
                          $off=0;
                        }
                        else{$off=($pg*8)-9;}
                        
                      } 
                    else{$pg=1; $off=0;}       
                $pp="SELECT *  FROM posts ORDER BY `time` DESC LIMIT $off,8 ";
                 $rpp=mysqli_query($conn,$pp);
                 $months=['January','February','March','April','May','June','July','August','September','October','November','December'];
                 while ($gpp=mysqli_fetch_array($rpp)) {
                  $id=$gpp['id'];
                  $categories=$gpp['categories'];
                  $head=$gpp['head'];
                  $post=$gpp['post'];
                  $uploader=$gpp['uploader'];
                  $img=$gpp['img'];
                  $d=$gpp['time'];
                  $comments=mysqli_query($conn,"SELECT COUNT(id) as total FROM post_comments WHERE post_id=$id");
                  $mment=mysqli_fetch_assoc($comments);
                  $comment=$mment['total'];
                  $que="SELECT primg from register where username='$uploader'";
                  $rque=mysqli_query($conn,$que);
                  $gque=mysqli_fetch_row($rque);
                  $primg=$gque[0];
                  $da=date("Y/m/d",$d);
                  $y=substr($da, 0,4);
                  $m=$months[substr($da, 5,2)-1];
                  $dat=substr($da, 8,2);
                  $dateca=(time()-$d)/3600;
                  if ($dateca<24) {
                    $datecal=round($dateca).' hours ago';
                  }
                  elseif ($dateca>=24 and $dateca<168) {
                    $datecal=floor($dateca/24).' days ago';
                  }
                  elseif ($dateca>=168 and $dateca<672) {
                      $datecal=floor($dateca/168).' weeks ago';
                  }
                  elseif ($dateca>=672 and $dateca<8064) {
                      $datecal=floor($dateca/672).' months ago';
                  }
                  elseif ($dateca>=8064) {
                    $datecal=floor($dateca/8064).' years ago';
                  }
                  
                  echo "<div class='post col-xl-6'>";
                  if ($img=='') {
                  echo "<div class='post-details'>
                        <div class='post-meta d-flex justify-content-between'>
                        <div class='date meta-last'>$dat $m | $y</div></div>    
                        <a href='posts.php?id=$id'><h3 class='h4'>$head</h3></a>
                        <div class='text-mutedd'>$post</div>
                        <footer class='post-footer d-flex align-items-center'><a href='user.php?name=$uploader' class='author d-flex align-items-center flex-wrap'>
                        <div class='avatar'><img src='img/profile/$primg' alt='...'' class='img-fluid'></div>
                        <div class='title'><span>$uploader</span></div></a>
                      <div class='date'><i class='icon-clock'></i> $datecal</div>
                      <div class='comments meta-last'><i class='icon-comment'></i>$comment</div>
                    </footer>
                  
                  </div>
                  </div>
                  ";}
                  
                  else{
                    echo " <div class='post-thumbnail'><a href='posts.php?id=$id'><img src='img/posts/$img' alt='...'' class='img-fluid'></a></div>
                      <div class='post-details'>
                        <div class='post-meta d-flex justify-content-between'>
                        <div class='date meta-last'>$dat $m | $y</div></div>    
                        <a href='posts.php?id=$id'><h3 class='h4'>$head</h3></a>
                        <div class='text-muted'> $post</div>
                        <footer class='post-footer d-flex align-items-center'><a href='user.php?name=$uploader' class='author d-flex align-items-center flex-wrap'>
                        <div class='avatar'><img src='img/profile/$primg' alt='...'' class='img-fluid'></div>
                        <div class='title'><span>$uploader</span></div></a>
                      <div class='date'><i class='icon-clock'></i>$datecal</div>
                      <div class='comments meta-last'><i class='icon-comment'></i>$comment</div>
                    </footer>
                  
                  </div>
                  </div>
                    ";
                  };}}
               ?>
              
                </div>
              </div>
           
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
                 <?php  
                 if (isset($_GET['search'])) {
                  $quer=$_GET['search'];
                  $query=trim($quer);
                  echo "<li class='page-item'><a class='page-link leftsearch'> <i class='fa fa-angle-left'></i></a></li>";
                  $no=mysqli_query($conn,"SELECT COUNT(id) as total FROM posts where post or head like '%$query%'");
                  $nos=mysqli_fetch_assoc($no);
                  $num=ceil($nos['total']/8);
                  for ($i=1; $i<$num+1 ; $i++) { 
                    $i=$i;
                    echo "<li class='page-item'><a href='post.php?search=$query&pg=$i' class='page-link active'>$i</a></li>";
                  };
                  echo "<li class='page-item'><a class='page-link rightsearch' lim=$num> <i class='fa fa-angle-right'></i></a></li>";
                 }

                 else{
                  echo "<li class='page-item'><a class='page-link left'> <i class='fa fa-angle-left'></i></a></li>";
                  $no=mysqli_query($conn,"SELECT COUNT(id) as total FROM posts");
                  $nos=mysqli_fetch_assoc($no);
                  $num=ceil($nos['total']/8);
                  for ($i=1; $i<$num+1 ; $i++) { 
                    $i=$i;
                    echo "<li class='page-item'><a href='post.php?pg=$i' class='page-link active'>$i</a></li>";
                  };
                  echo "<li class='page-item'><a class='page-link right' lim=$num> <i class='fa fa-angle-right'></i></a></li>";
                 }
                ?>
                
              </ul>
            </nav>
        </main>
        <aside class="col-lg-4 side">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form action="post.php" method='get' class="search-form">
              <div class="form-group">
                <input type="search" name='search' placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search for"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]-->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>
           
                <?php

                  $pp="SELECT * FROM posts WHERE (head IS NOT NULL AND img IS NOT NULL) ORDER BY `time` DESC LIMIT 3";
                  $rpp=mysqli_query($conn,$pp);
                  while ($gpp=mysqli_fetch_array($rpp)) {
                  $id=$gpp['id'];
                  $head=$gpp['head'];
                  $img=$gpp['img'];
                  $d=$gpp['time'];

                  $comments=mysqli_query($conn,"SELECT COUNT(id) as total FROM post_comments WHERE post_id=$id");
                  $mment=mysqli_fetch_assoc($comments);
                  $comment=$mment['total'];

                  echo "
                    <div class='blog-posts'><a href='posts.php?id=$id'>
                      <div class='item d-flex align-items-center'>
                        <div class='image'><img src='img/posts/$img' alt='...' class='img-fluid'></div>
                        <div class='title'><strong>$head</strong>
                        <div class='d-flex align-items-center'>
                      <div class='comments'><i class='icon-comment'></i>$comment</div>
                    </div>
                  </div>
                </div></a>";
                }
 

                  ?>

          </div>
          <!-- Widget [Categories Widget]-->
          
        </aside>
      </div>
      </div>
    
    <!-- Page Footer-->
 <?php include 'footer.php'; ?>
  </body>
</html>