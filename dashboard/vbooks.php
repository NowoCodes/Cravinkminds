<?php
$title = 'View Books';
$page = 'vbooks';
session_start();
include '../engine/conn.php';
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

$sam = "SELECT * FROM register where username='$cravinkuname'";
$rsam = mysqli_query($conn, $sam);
$gsam = mysqli_fetch_assoc($rsam);

$primg = $gsam['primg'];
$name = $gsam['name'];
$uname = $gsam['username'];
$email = $gsam['email'];
$address = $gsam['address'];
$phone = $gsam['phone'];

$result = getAll($conn);

include 'dashboard-nav.php' ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-4">
  <a href="" class="mb-2">Add new book</a>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">


    <div class="table-responsive">
      <table class="table table-sm">
        <thead>
          <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <td><?= $row['book_isbn']; ?></td>
              <td><?= $row['book_title']; ?></td>
              <td><?= $row['book_author']; ?></td>
              <td><?= $row['book_image']; ?></td>
              <td><?= $row['book_descr']; ?></td>
              <td><?= $row['book_price']; ?></td>
              <td><a href="admin_edit.php?bookisbn=<?= $row['book_isbn']; ?>">Edit</a>
              <a href="admin_delete.php?bookisbn=<?= $row['book_isbn']; ?>">Delete</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

  </div>
</main>
</div>
<script type="text/javascript" src="js/npost.js"></script>

<?php include 'sidebar.php' ?>
</body>

</html>