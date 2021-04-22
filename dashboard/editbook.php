<?php
$title = 'Edit Books';
$page = 'editbook';
session_start();
include '../engine/conn.php';
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

include 'dashboard-nav.php';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  echo "Empty query!";
  exit;
}

// get book data
$query = "SELECT * FROM books WHERE id = '$id'";
$result = mysqli_query($conn, $query);
if (!$result) {
  echo "Can't retrieve data " . mysqli_error($conn);
  exit;
}
$row = mysqli_fetch_assoc($result);
?>

<div class="container-fluid font-weight-bold">
  <main role="main" class="col-md-qw pt-1 px-3">
    <div class="justify-content-start flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

      <form method="post" action="bookedit.php" enctype="multipart/form-data">
        <h1 class="display-2">Edit Book</h1>

        <input value="<?= $row['id']; ?>" name="id" type="hidden">
        <div class="form-group">
          <label for="title">Title: <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="title" value="<?php echo $row['book_title']; ?>" required>
        </div>
        <div class="form-group">
          <label for="author">Author: <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="author" value="<?php echo $row['book_author']; ?>" required>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <p>Cover Image: <span class="text-danger">*</span></p>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" required>
              <label class="custom-file-label" for="customFile"><?= $row['book_image'] ?></label>
            </div>
          </div>
          <div class="col-md-6 form-group">

            <p>Book: <span class="text-danger">*</span></p>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="ebook" required>
              <label class="custom-file-label" for="customFile"><?= $row['ebook'] ?></label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="descr">Description: </label>
          <td><textarea name="descr" class="form-control" form-control" rows="5"><?php echo $row['book_descr']; ?></textarea>
        </div>
        <div class="form-group">
          <label for="link">Purchase Link: </label>
          <input type="text" class="form-control" name="link" value="<?php echo $row['purchase_link']; ?>">
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="price">Price: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="price" value="<?php echo $row['book_price']; ?>" required>
          </div>
          <div class="col-md-6 form-group">
            <label for="list_price">List Price: </label>
            <input type="text" class="form-control" name="list_price"value="<?php echo $row['list_price']; ?>">
          </div>
        </div>
        <input type="submit" name="save_change" value="Update" class="btn btn-sm btn-success">
        <input type="reset" value="cancel" class="btn btn-default btn-sm">
      </form>
      <a href="viewbooks.php" type="button" class="btn btn-sm">Back</a>
    </div>
  </main>
</div>
<?php
if (isset($conn)) {
  mysqli_close($conn);
}
?>

<?php include '../scripts.php'; ?>

<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
</body>

</html>