<?php 
$page = 'events';
$title = "Master Class - CravinkMinds";
$description = "Imagine becoming an irresistible writer…";
include 'header.php';
include 'engine/conn.php';

?>

<style type="text/css">



.center-btn {
  display: flex;
  justify-content: center;
  align-items: center; 

  text-indent:-9999px;
	
	border:none;
	cursor:pointer;
}

</style>
  
  
  <div class="p-4 p-md-5 hero mb-4 text-center text-white" style="background: #011e22">
    <div class="col-md-6 container px-0">
      <h1 class="display-4 ">Imagine becoming an irresistible writer....


</h1>
      <p class=" my-3">Discover the secrets to writing extremely well and making money from it!!
</p>

    
    </div>
  </div>

<p class="lead container text-white  text-center p-5" style="background: #42929d">Please watch the video below. It explains who we are and all the benefits you are getting from this training. 
It also includes the first part of the free class. (If you are in a hurry,  you can increase the playback speed. Thank you.)</p>

<div id='media-player' class="container-fluid ">
<video id='media-video' autoload width="100%">
			<source src='video/Master_Class_Introduction_Video-1.mp4' type='video/mp4'>
			
		</video>
		<div id='media-controls'>
			<progress id='progress-bar' min='0' max='100' value='0' style="width: 100%">0% played</progress>
			<br>
			<!--<button id='replay-button' class='replay' title='replay' onclick='replayMedia();'>Replay</button>-->
			<div class="center-btn">
			<button id='play-pause-button' class='play' title='play' onclick='togglePlayPause();'>Play</button>
			<!--<button id='stop-button' class='stop' title='stop' onclick='stopPlayer();'>Stop</button>-->
			<button id='volume-inc-button' class='volume-plus' title='increase volume' onclick='changeVolume("+");'>volume +</button>
			<button id='volume-dec-button' class='volume-minus' title='decrease volume' onclick='changeVolume("-");'>volume -</button>
			<button id='mute-button' class='mute' title='mute' onclick='toggleMute("true");'>Mute</button>
			<select id="playRate" class='mute volume-plus' onchange="playRate()">
                    <option value="0.5">0.5x</option>
                    <option selected= "selected" value="1">1x</option>
                    <option value="1.5">1.5x</option>
                    <option value="2">2x</option>
                    <option value="2.5">2.5x</option>
                    <option value="3">3x</option>
           </select>	
		</div>
		</div>	
	</div>
	<script type="text/javascript">
	

	// Wait for the DOM to be loaded before initialising the media player
document.addEventListener("DOMContentLoaded", function() { initialiseMediaPlayer(); }, false);

// Variables to store handles to various required elements
var mediaPlayer;
var playPauseBtn;
var muteBtn;
var progressBar;
var playRate;




function initialiseMediaPlayer() {
	// Get a handle to the player
	mediaPlayer = document.getElementById('media-video');
	// Get handles to each of the buttons and required elements
	playPauseBtn = document.getElementById('play-pause-button');
	muteBtn = document.getElementById('mute-button');
	progressBar = document.getElementById('progress-bar');
    playRate = document.getElementById('playRate');



 playRate.addEventListener("change", function(evt) {
		mediaPlayer.playbackRate = evt.target.value;
	});



 progressBar.addEventListener("click", seek);

  function seek(e) {
      var percent = e.offsetX / this.offsetWidth;
      mediaPlayer.currentTime = percent * mediaPlayer.duration;
      e.target.value = Math.floor(percent / 100);
      e.target.innerHTML = progressBar.value + '% played';
  }


	// Hide the browser's default controls
	mediaPlayer.controls = false;
	
	// Add a listener for the timeupdate event so we can update the progress bar
	mediaPlayer.addEventListener('timeupdate', updateProgressBar, false);
	
	// Add a listener for the play and pause events so the buttons state can be updated
	mediaPlayer.addEventListener('play', function() {
		// Change the button to be a pause button
		changeButtonType(playPauseBtn, 'pause');
	}, false);
	mediaPlayer.addEventListener('pause', function() {
		// Change the button to be a play button
		changeButtonType(playPauseBtn, 'play');
	}, false);
	
	// need to work on this one more...how to know it's muted?
	mediaPlayer.addEventListener('volumechange', function(e) { 
		// Update the button to be mute/unmute
		if (mediaPlayer.muted) changeButtonType(muteBtn, 'unmute');
		else changeButtonType(muteBtn, 'mute');
	}, false);	
	mediaPlayer.addEventListener('ended', function() { this.pause(); }, false);	
}

function togglePlayPause() {
	// If the mediaPlayer is currently paused or has ended
	if (mediaPlayer.paused || mediaPlayer.ended) {
		// Change the button to be a pause button
		changeButtonType(playPauseBtn, 'pause');
		// Play the media
		mediaPlayer.play();
	}
	// Otherwise it must currently be playing
	else {
		// Change the button to be a play button
		changeButtonType(playPauseBtn, 'play');
		// Pause the media
		mediaPlayer.pause();
	}
}



// Changes the volume on the media player
function changeVolume(direction) {
	if (direction === '+') mediaPlayer.volume += mediaPlayer.volume == 1 ? 0 : 0.1;
	else mediaPlayer.volume -= (mediaPlayer.volume == 0 ? 0 : 0.1);
	mediaPlayer.volume = parseFloat(mediaPlayer.volume).toFixed(1);
}

// Toggles the media player's mute and unmute status
function toggleMute() {
	if (mediaPlayer.muted) {
		// Change the cutton to be a mute button
		changeButtonType(muteBtn, 'mute');
		// Unmute the media player
		mediaPlayer.muted = false;
	}
	else {
		// Change the button to be an unmute button
		changeButtonType(muteBtn, 'unmute');
		// Mute the media player
		mediaPlayer.muted = true;
	}
}



// Update the progress bar
function updateProgressBar() {
	// Work out how much of the media has played via the duration and currentTime parameters
	var percentage = Math.floor((100 / mediaPlayer.duration) * mediaPlayer.currentTime);
	// Update the progress bar's value
	progressBar.value = percentage;
	// Update the progress bar's text (for browsers that don't support the progress element)
	progressBar.innerHTML = percentage + '% played';
}

// Updates a button's title, innerHTML and CSS class to a certain value
function changeButtonType(btn, value) {
	btn.title = value;
	btn.innerHTML = value;
	btn.className = value;
}

// Loads a video item into the media player
function loadVideo() {
	for (var i = 0; i < arguments.length; i++) {
		var file = arguments[i].split('.');
		var ext = file[file.length - 1];
		// Check if this media can be played
		if (canPlayVideo(ext)) {
			// Reset the player, change the source file and load it
			resetPlayer();
			mediaPlayer.src = arguments[i];
			mediaPlayer.load();
			break;
		}
	}
}

// Checks if the browser can play this particular type of file or not
function canPlayVideo(ext) {
	var ableToPlay = mediaPlayer.canPlayType('video/' + ext);
	if (ableToPlay == '') return false;
	else return true;
}


</script>


 
<h3 class="container pb-4 mb-4 mt-5 font-italic border-bottom">⏳ Course Start Date:  1st day of every month | Little to no writing experience required.
</h3>
     
     
  <a class="btn-lg hover text-white text-uppercase btn-block btn" href="https://chat.whatsapp.com/BeRDEXk86mCLe1Bmoa2Rx5" role="button" target="_blank"> Click here to join the FREE class now!</a>   
     
     <section class="container">
         <h2 class="mb-5">Do you desire to possess irresistible writing skills that will keep generating money for you even while you sleep?</h2>
         <p>Then this is for you. You have found the ONLY 99.9% most comprehensive and rigorous writing course on the planet.
Requirements: Little Data, little/no writing experience, and an attentive mind</p>
<h4 class="text-uppercase text-center mt-5">What you Get in this training
</h4><p class="text-uppercase text-center">3 Main Packages
</p>
         <div class="row">
             <div class="col-md">
                 <p><strong>PACKAGE 1:</strong> 42 hours of Rigorous training on how to create jaw dropping writings with practical examples</p>
                 <br>
                  <img src="img/1a.jpg" class="d-block w-100" alt="...">
                 
             </div>
             <div class="col-md">
                 <p><strong>PACKAGE 2:</strong> One-week training on how to publish and earn from writing </p>
                 <br>
                 <img src="img/1a.jpg" class="d-block w-100" alt="...">
             </div>
             <div class="col-md">
                 <p><strong>PACKAGE 3:</strong> Lifetime Membership into the community</p>
                 <br>
                 <img src="img/1a.jpg" class="d-block w-100" alt="...">
             </div>
             
         </div>
         
         
         
         
         
         <div class="row">
             <div class="col-md">
                 <h2 class="text-uppercase text-center">What you find in Package 1</h2>
                <ul>
                    <li>√ Grammar Class [Basic secrets on grammar and beyond grammar that makes good writing] (worth 7$)</li>
                    <li>√ In-depth secrets that will teach you how to write jaw dropping sentences (worth 7$)</li>
                    <li>√ How to make use of schemes and tropes to add beauty and flavour to your writing (worth 5$)</li>
                    <li>√ In-depth Poetry Workshop [learning the core secrets of poems and how to write better poems] (worth 7$)</li>
                    <li>√ In-depth Fiction classes [Discovering the uncommon keys to unlocking irresistible novels] (worth 14$)</li>
                    <li>√ In-depth Nonfiction classes [The reality of nonfiction and how to write the best ones] worth (worth 8$)</li>
                    <li>√ In-depth script writing class [The basics of script writing and how to write scripts that keep your audience glued] (worth 4$)</li>
                    <li>√ How to master the basics of story telling (worth 5$)</li>
                    <li>√ Main Guidebook by the tutor on everything about creative writing (worth 12$) <img src="img/posts/book2.jpg" class="d-block w-100" alt="..."> </li>
                    <li>√ A rare explanation on humor and how to write humorous fiction worth (worth 3$)</li>
                    <li>√ How to overcome your writer’s block once and for all worth (worth 5$)</li>
                </ul>
                 <strong>TOTAL WORTH = 77.3$ (N36,872)</strong>
             </div>
             <div class="col-md">
                 <h2 class="text-uppercase text-center">What you find in Package 2</h2>
                <ul>
                    <li>√ Full access to my Publishing Series [Traditional publishing vs Self-publishing, pros and cons, and how to Publish on Amazon from anywhere in the world ]
                    (worth 25$)<img src="img/posts/book3.jpg" class="d-block w-100" alt="..."></li>
                    <li>√ How to create 100% free and captivating book covers (worth 10$)</li>
                    <li>√ How to set up your published book on amazon in ways that will continually attract buyers (worth 5$)</li>
                    <li>√ How to make use of both free and paid-advertisement to make book sales (worth 5$)</li>
                    <li>√ How to set up your kindle content page [without this, people will not buy your book] (worth 5$)</li>
                </ul>
                 <strong>TOTAL WORTH = 50$ (N23, 850)</strong>
             </div>
             <div class="col-md">
                 <h2 class="text-uppercase text-center">What you find in Package 3</h2>
                <ul>
                    <li><img src="img/1b.jpg" class="d-block w-100" alt="...">Lifetime membership to the community. The lifetime membership gives you;</li>
                    <li>√ lifetime access to the cravinkminds book  library, (worth 30$)</li>
                    <li>√ Lifetime access to subsequent awards and programs of the community (worth 19$)</li>
                    <li>√ Lifetime access to publish and promote books freely on our website and social media platforms (worth 15$)</li>
                    <li>√ Lifetime access to our monthly cash awards (worth 11.9$)</li>
                </ul>
                 <strong>TOTAL PRICE = 75.9$</strong>
             </div>
             
         </div>
         <div class="mt-5 ">
             <div class="text-center">
             <h3>PACKAGE 1 + PACKAGE 2 + PACKAGE 3 = <strong>203.2$</strong></h3>
             <p>But we will not charge anything close to this. The Registration fee  for the full package is <strong>N5000 only</strong>. No extra charges</p>
             <p>But our desire is not in making money off you. Our goal is to build a community of writers. We understand that not many people can afford this price.
             We also understand that the contents we are teaching are too much that students will not be able to value the efforts and contents when they pay nothing. 
             This is why we’ll be doing this ↓</p>
             <p>The first 50 people to register before the 10th day of the month will be getting the three packages for <strong>N2000 only</strong>. 
             Lifetime access without any extra charges whatsoever!</p>
             <p>In fact, because we are very interested in accommodating everyone, those who cannot afford the full package can pay for them separately. 
             But this offer is valid only until the 10th day of the month.</p>
             
             </div>
             <div class="row text-center mb-3">
                 <div class="col-md">
                     <strong> FULL PACKAGE N2000</strong>
             <a class="btn-lg hover text-white text-uppercase btn-block btn" href="https://paystack.com/pay/Cravinkmasterclass" role="button" target="_blank">GET FULL ACCESS NOW! &raquo;</a>
             <P>Please note that the full package jumps back to the regular price N5000 after the 10th day of the month, and all other packages increase by 50% too after the 10th day of month</P>
                 </div>
                 <div class="col-md">
                     <strong> PACKAGE 1&2 ONLY N1500</strong>
             <a class="btn-lg hover text-white text-uppercase btn-block btn" href="https://paystack.com/pay/Package1and2" role="button" target="_blank">GET FULL ACCESS NOW! &raquo;</a>
             <P>Membership and Full training </P>
                 </div>
                 <div class="col-md">
                     <strong>PACKAGE 1 ONLY:  N1000 </strong>
             <a class="btn-lg hover text-white text-uppercase btn-block btn" href="https://paystack.com/pay/package1only" role="button" target="_blank">GET FULL ACCESS NOW! &raquo;</a>
             <P>No membership or publishing class </p></div>
             <div class="col-md">
                     <strong class="text-uppercase">If you have issues with the payment links </strong>
             
             <P>you can send your payment through bank transfer to the details below and send a 
             screenshot to our whatsapp number +2349043943251;<br>
             Bank Name: <strong> Gtbank</strong><br>
             Account Name: <strong>Joel Adewale</strong> <br>
             Account Number: <strong>0241754604</strong> </p>
             </div>
                  <strong class="mt-3  text-center mb-2">WE HAVE ONE PROBLEM. WE ONLY TAKE IN 50 STUDENTS MONTHLY. 
             THIS IS BECAUSE WE ARE INCAPABLE OF PAYING ATTENTION AND CONCERN TO THE GROWTH OF TOO MANY STUDENTS. WE APOLOGISE FOR THIS. 
             BUT UNFORTUNATELY,  WE HAVE LIMITED SLOTS AVAILABLE. EVERY MONTH, 
             THIS LINK BECOMES INACCESSIBLE ONCE 50 PEOPLE HAVE REGISTERED.</strong>
             </div>
             
            
            
<p class="mt-2 text-center mb-5">P.s everyone gets access to the free class. But fast action takers save their spot. 
Register now while the membership fee is still low. While you are reading this, hundreds 
of other people are reading this too. All the seats will be occupied if you do not take action now.</p>


<div class="row hover mb-5 text-white p-5">
    <div class=" mt-5 mt-4 col-md">
        <h1>Structure of the training</h1>
    </div>
     <div class="col-md">
        <ul>
            <li>+ Week 1-3 Full rigorous courses on writing.</li>
            <li>+ week 4 Full rigorous training on Publishing.</li>
            <li>+ Lifetime access to all the notes, videos and materials.</li>
            <li>+ Venue: The most 100% storage safe and interactive platform—telegram.</li>
            <li>+ Support: it requires the presence of teacher and student(s) for almost all the classes.</li>
            <li>+ Improvement: There will always be drills and exercises given to students to submit to track their improvement.</li>
        </ul>
    </div>
</div>


             
           
           
           
           <div class="row">
               
               <div class="col-md">
                   <p>Never forget, if you own a website, a blog,  a facebook profile, instagram or any other 
           social media handle you are one thing—a writer. Do not make the mistake of thinking that writing 
           doesn’t concern you. In fact, you write everyday and survive on it.  Everybody writes!!</p>  
               </div>
               
               
               
               
               <div class="col-md container">
      <h4>Here are a few Testimonials from past students</h4>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/tes/tes1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/tes/tes2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/tes/tes3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/tes/tes4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/tes/tes5.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/tes/tes6.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/tes/tes7.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/tes/tes8.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/tes/tes9.jpg" class="d-block w-100" alt="...">
    </div>
    
  </div>



  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
         </div>
         
         
         
         </div>
         
     </section>
     
     
     
 

<!--background: url(img/admin.jpg) 0 0 no-repeat fixed;overflow: hidden; background-size: cover; background-position: center bottom-->


    <!-- Latest Posts -->
  
    <!-- Newsletter Section-->
    <section class="newsletter m-5 no-padding-top">    
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
   <!-- Page Footer-->
   <?php include 'footer.php';?>
  
  </body>
</html>