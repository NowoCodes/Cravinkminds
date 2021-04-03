<?php
$title = 'View Book';
$page = 'books';
// session_start();
// include '../engine/conn.php';
// if (isset($_SESSION['cravinkuname'])) {
// 	$cravinkuname=$_SESSION['cravinkuname'];	
// }
// else{
// 	header("Location:../login.php");
// }

// $sam = "SELECT * FROM register where username='$cravinkuname'";
// $rsam = mysqli_query($conn, $sam);
// $gsam = mysqli_fetch_assoc($rsam);

// $primg = $gsam['primg'];
// $name = $gsam['name'];
// $uname = $gsam['username'];
// $email = $gsam['email'];
// $address = $gsam['address'];
// $phone = $gsam['phone'];


include 'dashboard-nav.php' ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<table class="table table-sm">
  <thead>
    <th>ISBN</th>
    <th>Title</th>
    <th>Author</th>
    <th>Image</th>
    <th>Description</th>
    <th>Price</th>
    <th>Publisher</th>
    <th>Actions</th>
  </thead>

  <tbody>
    <tr>
      <td>978-12-12</td>
      <td>Kearn Arduino</td>
      <td>Sandy C. Leaon</td>
      <td>wahala.jpg</td>
      <td>When you have questions about C# 6.0 or the .NET CLR and its core Framework assemblies, this bestselling guide has the answers you need. C# has become.</td>
      <td>20.0</td>
      <td>Sam</td>
      <td></td>
    </tr>
  </tbody>
</table>

</div>
	</main>
</div>
<script type="text/javascript" src="js/npost.js"></script>

<?php include 'sidebar.php' ?>
</body>
</html>