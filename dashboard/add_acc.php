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

<main role="main" class="col-md-qw ml-sm-auto pt-1 px-5 mx-5">
  <div class="flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

    <form method="post" action="adacc.php" enctype="multipart/form-data">
      <h1 class="display-1">Add Account Details</h1>

      <table class="table">
        <tr>
          <th>Account Name <span class="text-danger">*</span></th>
          <td><input type="text" class="form-control" name="acc_name" required></td>
        </tr>
        <tr>
          <th>Account Number <span class="text-danger">*</span></th>
          <td><input type="number" class="form-control" name="acc_no" required></td>
        </tr>
        <tr>
          <th>Bank Name <span class="text-danger">*</span></th>
          <td><input type="text" class="form-control" name="bank"></td>
        </tr>
      </table>
  </div>
  <input type="submit" name="add" value="Add Account Details" class="btn btn-sm btn-success">
  <input type="reset" value="cancel" class="btn bt btn-default">
  </form>
  <br />
  <a href="viewbooks.php" type="button" class="btn btn-sm">Back</a>
</main>
</body>

</html>