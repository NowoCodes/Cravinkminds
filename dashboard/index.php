<?php  
include '../engine/conn.php';
session_start();
$title = 'Dashboard - Cravinkminds';
$page = 'dashboard';
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname=$_SESSION['cravinkuname'];
}
else{
  header('Location:../login.php');
}
 
        $sam="SELECT * FROM register where username='$cravinkuname'";
        $rsam=mysqli_query($conn,$sam);
        $gsam=mysqli_fetch_assoc($rsam);

        $primg=$gsam['primg'];
        $name=$gsam['name'];
        $uname=$gsam['username'];
        $email=$gsam['email'];
        $address=$gsam['address'];
        $phone=$gsam['phone'];
        $country=$gsam['country'];
     
        
      ?>
<?php include 'dashboard-nav.php' ?>

<?php include 'sidebar.php' ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-4">
    <h4 class="text-uppercase mt-3 text-center"> Welcome to your dashboard, <?php echo "$name" ?> </h4>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">



      

        <div class="posts">


      <h3 class="center align-items-center text-center"> YOUR POSTS</h3>
      <hr style='width: 100%; box-sizing: border-box; background-color: rgba(0,0,0,0.1); color: rgba(0,0,0,0.1);'>

      <?php  
        $psam="SELECT * FROM posts where uploader='$cravinkuname'";
        $rpsam=mysqli_query($conn,$psam);
        while($gpsam=mysqli_fetch_assoc($rpsam)){
          $id=$gpsam['id'];
          $head=$gpsam['head'];
          $img=$gpsam['img'];
          $post=$gpsam['post'];
          if ($post=='') {
            echo "<div style='display:inline-flex; flex-wrap:wrap; margin-bottom: 10px; margin-left: 10px;'>";
            echo "<img src='../img/posts/$img' class='ge' height='auto' width='200px'><br>";
            echo "<div class='full'> <img src='icons/delete-button.svg' class='delb'><img src='../img/posts/$img' class='fe'><br> </div>";

            echo "<div style='margin-left: 50px;'> <a class='chapospic' style=' font-size: 14px; cursor: pointer; color: #8fc13c; font-weight: bold; margin-top:0; text-decoration:underline;'>Change Picture </a> <br> <p class='delpos' id=$id uname=$cravinkuname style=' font-size: 14px; cursor: pointer; color: #42919c; margin-top:10px; font-weight: bold; text-decoration:underline;'>Delete Post </p></div>";
            echo "</div>";
                    }

                    else if($post!='' and $img!=''){
            echo "<div style='padding:10px; box-sizing: border-box;'><h4 id='$id' style=' border-radius: 5px; font-size: 20px; cursor: pointer; color: #42919c; margin-top:0; margin-bottom: 5px; font-size: 16px;'>$head </h4>
              <img src='../img/posts/$img' width='100px' height='auto'>
              <div class='ps'> 
                  <div class='pst'>
                      $post
                  </div>
                  <p> <a style='background-color: #8fc13c; border-radius: 5px;' class='edpost' href='editpost.php?id=$id'>Edit Post</a> <a class='delpos' id=$id uname=$cravinkuname style='background-color: #42919c; color: white; border-radius: 5px;'> Delete Post </a> </p>
              </div>
            </div>";
                    }
                    else{
                      echo "<div style='padding:10px; box-sizing: border-box;'><h4 id='$id' style=' border-radius: 5px; font-size: 20px; cursor: pointer; color: #42919c; margin-top:0; margin-bottom: 5px; font-size: 16px;'>$head </h4>
              <div class='ps'> 
                  <div class='pst'>
                      $post
                  </div>
                  <p> <a style='background-color: #8fc13c; border-radius: 5px;' class='edpost' href='editpost.php?id=$id'>Edit Post</a> <a class='delpos' id=$id uname=$cravinkuname style='background-color: #42919c; color: white; border-radius: 5px;'> Delete Post </a> </p>
              </div>
            </div>";
                    }
                };
        
      ?> 

    </div>

          </div><!--end of posts-->






 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">


        <div class="news">
      <h3 class="center align-items-center text-center"> YOUR NEWS</h3>
      <hr style='width: 100%; box-sizing: border-box; background-color: rgba(0,0,0,0.2); color: rgba(0,0,0,0.2);'>

      <?php  
        $psam="SELECT * FROM news where uploader='$cravinkuname'";
        $rpsam=mysqli_query($conn,$psam);
        while($gpsam=mysqli_fetch_assoc($rpsam)){
          $id=$gpsam['id'];
          $head=$gpsam['head'];
          $img=$gpsam['img'];
          $post=$gpsam['news'];
          if ($post=='') {
            echo "<div style='display:inline-flex; flex-wrap:wrap; margin-bottom: 10px; margin-left: 10px;'>";
            echo "<img src='../img/news/$img' class='ge' height='auto' width='200px'><br>";
            echo "<div class='full'> <img src='icons/delete-button.svg' class='delb'><img src='../img/posts/$img' class='fe'><br> </div>";

            echo "<div style='margin-left: 50px;'> <a class='chapospic' style='font-size: 14px; cursor: pointer; color: #8fc13c; font-weight: bold; margin-top:0; text-decoration:underline;'>Change Picture </a> <br> <p class='delns' id=$id uname=$cravinkuname style=' font-size: 14px; cursor: pointer; color: #42919c; margin-top:10px; font-weight: bold; text-decoration:underline;'>Delete News </p></div>";
            echo "</div>";
                    }

                    else if($post!='' and $img!=''){
            echo "<div style='padding:10px; box-sizing: border-box;'><h4 id='$id' style=' border-radius: 5px; font-size: 20px; cursor: pointer; color: #42919c; margin-top:0; margin-bottom: 5px; font-size: 16px;'>$head </h4>
              <img src='../img/news/$img' width='100px' height='auto'>
              <div class='ps'> 
                  <div class='pst'>
                      $post
                  </div>
                  <p> <a style='background-color: #8fc13c; border-radius: 5px;' class='edpost' href='editnews.php?id=$id'>Edit News</a> <a class='delns' id=$id uname=$cravinkuname style='background-color: #42919c; color: white; border-radius: 5px;'> Delete News </a> </p>
              </div>
            </div>";
                    }
                    else{
                      echo "<div style='padding:10px; box-sizing: border-box;'><h4 id='$id' style=' border-radius: 5px; font-size: 20px; cursor: pointer; color: #42919c; margin-top:0; margin-bottom: 5px; font-size: 16px;'>$head </h4>
              <div class='ps'> 
                  <div class='pst'>
                      $post
                  </div>
                  <p> <a style='background-color: #8fc13c; border-radius: 5px;' class='edpost' href='editnews.php?id=$id'>Edit News</a> <a class='delns' id=$id uname=$cravinkuname style='background-color: #42919c; color: white; border-radius: 5px;'> Delete News </a> </p>
              </div>
            </div>";
                    }
                };




        
      ?> 
      </div>

          </div><!--end of news-->



</main>



</div>





    <?php include '../scripts.php'; ?>
  </body>
</html>