<?php
$page = 'index'; 
$title = 'A Writing hub for you - CravinkMinds';
$description = 'When your ink craves expression, train your mind to write!...';
include 'header.php'; 
?>
<style>
    

.word {
  margin: auto;
  color: white;
  font: 700 normal 2.5em 'futura';
  
}
    
</style>
<script>
    var words = ['When your ink craves expression, train your mind to write!'],
    part,
    i = 0,
    offset = 0,
    len = words.length,
    forwards = false,
    skip_count = 0,
    skip_delay = 100,
    speed = 100;
var wordflick = function () {
  setInterval(function () {
    if (forwards) {
      if (offset >= words[i].length) {
        ++skip_count;
        if (skip_count == skip_delay) {
          forwards = false;
          skip_count = 0;
        }
      }
    }
    else {
      if (offset == 0) {
        forwards = true;
        i++;
        offset = 0;
        if (i >= len) {
          i = 0;
        }
      }
    }
    part = words[i].substr(0, offset);
    if (skip_count == 0) {
      if (forwards) {
        offset++;
      }
      else {
        offset--;
      }
    }
    $('.word').text(part);
  },speed);
};

$(document).ready(function () {
  wordflick();
});

</script>


    <!-- Hero Section-->
    <section style="background: url(img/bgg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">             
          
         
            
           <!-- <h1 class="m17"><span class="text-wrapper"><span class="letters"> When your ink craves expression, train your mind to write!</span></span></h1>-->
            
            <div class="word"></div>
            
            
            
            
            
          </div>
        </div><a href="#intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro" id="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="h3">Who we are</h2>
            <p class="text-big">CravinkMinds is an innovation founded in 2020 by a couple of ardent writers and scholars towards one goal—to build an unbeatable  community of 
            impassioned writers. This is the purpose of the creative writing and publishing courses that the platform offers: to build every member of the community to a 
            point where their writings are unputdownable. This is  as a place for writing enthusiasts, both old and new, to come together and share their passion and excitement
            in genres of creative writing and literature at large. Updates, reviews, and descriptions on different fields of literature are provided here. </p>
          </div>
          <div class="col-lg-6">
              
              <p class="mt-3 text-big"> We want to create a 
            comfortable and considerate environment where every one is free to contribute, grow and enjoy. We host events and competitions occasionally to help stir up the creativity 
            in every member. Consequently,
            full publishing access and promotion is granted to members on this platform. We love literature and we help you enjoy your writing career. Have a great time here!</p>
              
              <video width="100%"  controls>
  <source src="video/cravinks.mp4" type="video/mp4">
</video>
              
          </div>
        </div>
      </div>
    </section>
    <section class="featured-posts no-padding-top">
      <div class="container">
        <?php  
          $featpost= array();
          $pp="SELECT *  FROM posts WHERE (post IS NOT NULL AND img IS NOT NULL) ORDER BY id DESC LIMIT 3";
          $rpp=mysqli_query($conn,$pp);
          while ($gpp=mysqli_fetch_array($rpp)) {
            $id=$gpp['id'];
            $categories=$gpp['categories'];
            $head=$gpp['head'];
            $post=$gpp['post'];
            $uploader=$gpp['uploader'];
            $img=$gpp['img'];
            $date=$gpp['time'];
            $comments=mysqli_query($conn,"SELECT COUNT(id) as total FROM post_comments WHERE post_id=$id");
            $mment=mysqli_fetch_assoc($comments);
            $comment=$mment['total'];

          $que="SELECT primg from register where username='$uploader'";
          $rque=mysqli_query($conn,$que);
          $gque=mysqli_fetch_row($rque);
          $primg=$gque[0];

          $dateca=(time()-$date)/3600;
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
          
            array_push($featpost,$head);
            array_push($featpost,$post);
            array_push($featpost,$primg);
            array_push($featpost,$uploader);
            array_push($featpost,$datecal);
            array_push($featpost,$comment);
            array_push($featpost,$img);
            array_push($featpost,$id);
       
          }
           echo " <div class='row d-flex align-items-stretch'>
          <div class='text col-lg-7'>
            <div class='text-inner d-flex align-items-center'>
              <div class='content'>
                <header class='post-header'>
                 <h2 class='h4'><a href='post.php?id=$featpost[7]'>$featpost[0]</h2></a>
                </header>
                <div class='text-muted'>$featpost[1]</div>
                <footer class='post-footer d-flex align-items-center'><a href='#'' class='author d-flex align-items-center flex-wrap'>
                    <div class='avatar'><img src='img/profile/$featpost[2]' alt='...' class='img-fluid'></div>
                    <div class='title'><span>$featpost[3]</span></div></a>
                  <div class='date'><i class='icon-clock'></i>$featpost[4]</div>
                  <div class='comments'><i class='icon-comment'></i>$featpost[5]</div>
                </footer>
              </div>
            </div>
          </div>
          <div class='image col-lg-5'><img src='img/posts/$featpost[6]' alt='...'></div>
        </div>

            ";

             echo " <div class='row d-flex align-items-stretch'>
              <div class='image col-lg-5'><img src='img/posts/$featpost[14]' alt='...'></div>
          <div class='text col-lg-7'>
            <div class='text-inner d-flex align-items-center'>
              <div class='content'>
                <header class='post-header'>
                 <h2 class='h4'><a href='post.php?id=$featpost[15]'>$featpost[8]</h2></a>
                </header>
                <div class='text-muted'>$featpost[9]</div>
                <footer class='post-footer d-flex align-items-center'><a href='#'' class='author d-flex align-items-center flex-wrap'>
                    <div class='avatar'><img src='img/profile/$featpost[10]' alt='...' class='img-fluid'></div>
                    <div class='title'><span>$featpost[11]</span></div></a>
                  <div class='date'><i class='icon-clock'></i>$featpost[12]</div>
                  <div class='comments'><i class='icon-comment'></i>$featpost[13]</div>
                </footer>
              </div>
            </div>
          </div>
         
        </div>

            ";
          
           echo " <div class='row d-flex align-items-stretch'>
          <div class='text col-lg-7'>
            <div class='text-inner d-flex align-items-center'>
              <div class='content'>
                <header class='post-header'>
                 <h2 class='h4'><a href='post.php?id=$featpost[23]'>$featpost[16]</h2></a>
                </header>
                <div class='text-muted'>$featpost[17]</div>
                <footer class='post-footer d-flex align-items-center'><a href='#'' class='author d-flex align-items-center flex-wrap'>
                    <div class='avatar'><img src='img/profile/$featpost[18]' alt='...' class='img-fluid'></div>
                    <div class='title'><span>$featpost[19]</span></div></a>
                  <div class='date'><i class='icon-clock'></i>$featpost[20]</div>
                  <div class='comments'><i class='icon-comment'></i>$featpost[21]</div>
                </footer>
              </div>
            </div>
          </div>
          <div class='image col-lg-5'><img src='img/posts/$featpost[22]' alt='...'></div>
        </div>";
            ?>
        <!-- Post-->
         </div>
    </section>
    <!-- Divider Section-->
    <section style="background: url(img/2bg.jpeg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2>"CravinkMinds creative writing class"</h2><a href="masterclass.php" class="hero-link">Click here for details</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts"> 
      <div class="container">
        <header> 
          <h2>Latest News</h2>
        </header>
        <div class="row">
        <?php  
          $sam="SELECT * FROM news ORDER BY `date` DESC LIMIT 3";
          $rsam=mysqli_query($conn,$sam);
          $months=['January','February','March','April','May','June','July','August','September','October','November','December'];
          while ($gsam=mysqli_fetch_array($rsam)){
              $id=$gsam['id'];
              $head=$gsam['head'];
              $news=$gsam['news'];
              $img=$gsam['img'];
              $d=$gsam['date'];
              $date=substr($d,3,2);
              $m=substr($d, 0,2);
             /* if ($m[0]='0') {
                $m=$m[1];
              }*/
              $month=$months[$m-1];
              $year=substr($d, 6,4);
              echo "<div class='post col-md-4'>
                      <div class='post-thumbnail'><a href='news.php?id=$id'><img src='img/news/$img' alt='...' class='img-fluid'></a></div>
                       <div class='post-details'>
                        <div class='post-meta d-flex justify-content-between'>
                          <div class='date'>$date $month | $year </div>   
                      
                                </div><a href='news.php?id=$id'>
                                <h3 class='h4'>$head</h3></a>
                        <div class='text-muted'>$news</div>
                    </div>
                </div>
              ";            
          }
          if (!$rsam) {
            echo mysqli_error($conn);
          }
        ?>
        </div>
      </div>
    </section>
    <!-- Newsletter Section-->
    <section class="newsletter no-padding-top">    
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Subscribe to Our Newsletter</h2>
            <p class="text-big">To get latest updates.</p>
          </div>
          <div class="col-md-8">
            <div class="form-holder">
              <form action="#">
                <div class="form-group">
                  <input type="email" class="email submail" placeholder="Type your email address">
                  <button type="submit" class="submit hover subsubmit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php include 'footer.php'; ?>

  </body>
</html>