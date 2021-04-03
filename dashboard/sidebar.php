<?php
$sam = "SELECT * FROM register where username='$cravinkuname'";
$rsam = mysqli_query($conn, $sam);
$gsam = mysqli_fetch_assoc($rsam);

$primg = $gsam['primg'];
$name = $gsam['name'];
$uname = $gsam['username'];
$email = $gsam['email'];
$address = $gsam['address'];
$phone = $gsam['phone'];
?>

<div class="container-fluid">
  <!-- The Modal -->
  <div id="myModal" class="modal" style="padding-top: 18%;">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>
  <div class="row">
    <nav class="col-md-2 d-none profile d-md-block bg-light sidebar" style=" padding-top: 10%;" username=<?php echo $cravinkuname;  ?>>
      <div class="sidebar-sticky">

        <ul class="nav flex-column">


          <li class="nav-item dropdown">

            <div class="nav-link" id="navbarDropdown" style="height:100px" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



              <?php echo "<img src='../img/profile/$primg' id='btn' class='avatar-profile itt' data-holder-rendered='true'>"; ?>

            </div>

          </li>
          <li class="nav-item">
            <div class=" ">
              <p class="pet t nav-link desc">Full Name:</p>
              <?php echo "<p style='margin-bottom:5px;  margin-top:0; margin-left: 10px;'>$name</p>";  ?>

              <p class="pet t nav-link desc">Username:</p>
              <?php echo "<p style='margin-bottom:5px;  margin-top:0; margin-left: 10px;'>$uname</p>";  ?>

              <p class="pet t nav-link desc">E-mail:</p>
              <?php echo "<p style='margin-bottom:5px;  margin-top:0; margin-left: 10px;'>$email</p>";  ?>

              <p class="pet t nav-link desc">Address:</p>
              <?php echo "<p style='margin-bottom:5px; margin-top:0; margin-left: 10px;'>$address</p>";  ?>

              <p class="pet t nav-link desc">Phone Number:</p>
              <?php echo "<p style='margin-bottom:5px;  margin-top:0; margin-left: 10px;'>$phone</p>";  ?>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#1" role="button" aria-haspopup="true" aria-expanded="false">Edit Details</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li class="text-center">
                <p class="dropdown-item  profbut details">Edit Credentials</p>
              </li>

              <li class="text-center"><input type="file" id="actual-btn" class="dropdown-item profpic" hidden /></li>

              <li class="text-center"><label for="actual-btn" class='profbut'>Change Picture</label></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="text-center"><span id="file-chosen">No file chosen</span></li>
            </ul>
          </li>




          <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            var view = document.getElementById("btn");
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var span = document.getElementsByClassName("close")[0];


            view.onclick = function() {
              modal.style.display = "block";
              modalImg.src = "<?php echo "../img/profile/$primg" ?>"
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
          </script>




      </div>
      </li>
      </ul>
  </div>



  <div class="editdetails " style="position: fixed; padding-top: 10%; z-index: 1;">
    <div class="white">
      <form>
        <p style="text-align: center; font-family: futura; font-weight: bold; margin-bottom: 0px;">EDIT DETAILS </p>
        <p class="pet desc">Full Name:</p>
        <input type="text" class="fname" value=<?php echo "'$name'"; ?>>

        <p class="pet desc">Username:</p>
        <input type="text" class="uname" value=<?php echo "'$uname'"; ?>>

        <p class="pet desc">E-mail</p>
        <input type="email" class="email" value=<?php echo "'$email'"; ?>>

        <p class="pet desc">Address:</p>
        <input type="text" class="address" value=<?php echo "'$address'"; ?>>

        <p class="pet desc">Phone Number:</p>
        <input type="text" class="phone" value=<?php echo "'$phone'"; ?>>

        <p class="pet desc">Country:</p>
        <input type="text" class="country" value=<?php echo "'$country'"; ?>>

        <p style="text-align: center; box-sizing: border-box; height: 40px; padding-top: 5px;">
          <span class="hover btn p-1 cancel">CANCEL</span>
          <span class="hover btn p-1 submit">SUBMIT</span>
        </p>
      </form>
    </div>

  </div>

  </nav>

</div>