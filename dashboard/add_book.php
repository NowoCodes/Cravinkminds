<?php
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

    <form method="post" action="adbok.php" enctype="multipart/form-data">
      <h1 class="display-1">Add Book</h1>

      <table class="table">
        <tr>
          <th>ISBN</th>
          <td><input type="text" class="form-control" name="isbn"></td>
        </tr>
        <tr>
          <th>Title</th>
          <td><input type="text" class="form-control" name="title" required></td>
        </tr>
        <tr>
          <th>Author</th>
          <td><input type="text" class="form-control" name="author" required></td>
        </tr>
        <tr>
          <th>Image</th>
          <td>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </td>
        </tr>
        <tr>
          <th>Description</th>
          <td><textarea name="descr" class="form-control" form-control" rows="5"></textarea></td>
        </tr>
        <tr>
          <th>Purchase Link</th>
          <td><input type="text" class="form-control" name="link"></td>
        </tr>
        <tr>
          <th>Price</th>
          <td><input type="text" class="form-control" name="price" required></td>
        </tr>
      </table>
  </div>
  <input type="submit" name="add" value="Add new book" class="btn btn-sm btn-success">
  <input type="reset" value="cancel" class="btn bt btn-default">
  </form>
  <br />
</main>

</body>

</html>