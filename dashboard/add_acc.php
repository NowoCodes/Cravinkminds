<?php
$title = 'Add Account Details';
$page = 'add_acc';
include '../engine/conn.php';
session_start();
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

include 'dashboard-nav.php';
?>

<main role="main" class="font-weight-bold col-md-qw ml-sm-auto pt-1 px-3">
  <div class="flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

    <form method="post" action="adacc.php" enctype="multipart/form-data">
      <h1 class="display-2">Add Account Details</h1>

      <div class="form-group">
        <label for="acc_name">Account Name: <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="acc_name" required>
      </div>

      <div class="form-group">
        <label for="acc_no">Account Number: <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="acc_no" required>
      </div>

      <div class="form-group">
        <label for="bank">Bank Name: <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="bank" required>
      </div>

  </div>
  <input type="submit" name="add" value="Add Account Details" class="btn btn-sm btn-success">
  <input type="reset" value="cancel" class="btn bt btn-default">
  </form>
  <br />
  <a href="viewbooks.php" type="button" class="btn btn-sm">Back</a>
</main>
<?php include '../scripts.php'; ?>
</body>

</html>