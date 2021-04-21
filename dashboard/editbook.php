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

<main role="main" class="col-md-qw ml-sm-auto pt-1 px-5">
  <div class="justify-content-start flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

    <form method="post" action="bookedit.php" enctype="multipart/form-data">
      <h1 class="display-1">Edit Book</h1>
      <table class="table">
        <input value="<?= $row['id']; ?>" name="id" type="hidden">
        <tr>
          <th>Title <span class="text-danger">*</span></th>
          <td><input type="text" class="form-control" name="title" value="<?php echo $row['book_title']; ?>" required></td>
        </tr>
        <tr>
          <th>Author <span class="text-danger">*</span></th>
          <td><input type="text" class="form-control" name="author" value="<?php echo $row['book_author']; ?>" required></td>
        </tr>
        <tr>
          <th>Cover Image  <span class="text-danger">*</span></th>
          <td>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" required>
              <label class="custom-file-label" for="customFile"><?= $row['book_image'] ?></label>
            </div>
          </td>
        </tr>
        <tr>
          <th>Book <span class="text-danger">*</span></th>
          <td>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="ebook" required>
              <label class="custom-file-label" for="customFile"><?= $row['ebook'] ?></label>
            </div>
          </td>
        </tr>
        <tr>
          <th>Description</th>
          <td><textarea class="form-control" name="descr" rows="5"><?php echo $row['book_descr']; ?></textarea>
        </tr>
        <tr>
          <th>Purchase Link</th>
          <td><input type="text" class="form-control" name="link" value="<?php echo $row['purchase_link']; ?>"></td>
        </tr>
        <tr>
          <th>Price <span class="text-danger">*</span></th>
          <td><input type="text" class="form-control" name="price" value="<?php echo $row['book_price']; ?>" required></td>
        </tr>
        <tr>
          <th>List Price</th>
          <td><input type="text" class="form-control" name="list_price" value="<?php echo $row['list_price']; ?>"></td>
        </tr>
      </table>
      <input type="submit" name="save_change" value="Update" class="btn btn-sm btn-success">
      <input type="reset" value="cancel" class="btn btn-default btn-sm">
    </form>
    <a href="viewbooks.php" type="button" class="btn btn-sm">Back</a>
  </div>
</main>
<?php
if (isset($conn)) {
  mysqli_close($conn);
}
?>


<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
</body>

</html>