<?php
$title = 'View Account Details';
$page = 'view_acc';
include '../engine/conn.php';
session_start();
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

include 'dashboard-nav.php';

$pquery = "SELECT * FROM register WHERE username='$cravinkuname'";
$presult = mysqli_query($conn, $pquery);
while ($parray = mysqli_fetch_assoc($presult)) :
  $bankID = $parray['id'];
  $cquery = "SELECT * FROM bank_account WHERE user_id = '$bankID'";
  $cresult = mysqli_query($conn, $cquery);
  while ($row = mysqli_fetch_assoc($cresult)) :
?>

<main role="main" class="col-md-qw ml-sm-auto pt-1 px-5 mx-5">
  <div class="flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

    <h1>Bank: <?= $row['bank'] ?></h1><br>
    <h1>Account Name: <?= $row['acc_name'] ?></h1>
    <h1>Account No: <?= $row['acc_no'] ?></h1>

    <a href="viewbooks.php" type="button" class="btn btn-sm">Back</a>
  </div>
</main>
</body>

<?php 
  endwhile;
endwhile;
?>

</body>

</html>