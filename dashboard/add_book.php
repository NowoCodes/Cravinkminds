<?php
$title = 'Add Books';
$page = 'add_book';
include '../engine/conn.php';
session_start();
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

include 'dashboard-nav.php';
?>

<div class="container-fluid font-weight-bold">
  <main role="main" class="col-md-qw pt-1 px-3">
    <!-- <main role="main" class="col-md-qw ml-sm-auto pt-1 px-5 mx-5"> -->
    <div class="flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

      <form method="post" action="adbok.php" enctype="multipart/form-data">
        <h1 class="display-2">Add Book</h1>

        <div class="form-group">
          <label for="title">Title: <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
          <label for="author">Author: <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="author" required>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <p>Cover Image: <span class="text-danger">*</span></p>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" required>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="col-md-6 form-group">

            <p>Book: <span class="text-danger">*</span></p>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="ebook" required>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="descr">Description: </label>
          <td><textarea name="descr" class="form-control" form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label for="link">Purchase Link: </label>
          <input type="text" class="form-control" name="link">
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="price">Price: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="price" required>
          </div>
          <div class="col-md-6 form-group">
            <label for="list_price">List Price: </label>
            <input type="text" class="form-control" name="list_price">
          </div>
        </div>
    </div>
    <input type="submit" name="add" value="Add new book" class="btn btn-sm btn-success">
    <input type="reset" value="cancel" class="btn bt btn-default">
    </form>
    <br />
    <a href="viewbooks.php" type="button" class="btn btn-sm">Back</a>
  </main>
</div>

<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
</body>
<?php include '../scripts.php'; ?>

</html>