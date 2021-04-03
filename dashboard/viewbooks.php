<?php
$title = 'View Books';
$page = 'viewbooks';
session_start();
include '../engine/conn.php';
if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}


function getAll($conn){
  $query = "SELECT * from books ORDER BY book_isbn DESC";
  $result = mysqli_query($conn, $query);
  if(!$result){
      echo "Can't retrieve data " . mysqli_error($conn);
      exit;
  }
  return $result;
}
$result = getAll($conn);

include 'dashboard-nav.php' ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-4">
  <a href="add_book.php" class="mb-2 btn btn-success">Add new book</a>
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
              <td class="text-justify"><?= $row['book_descr']; ?></td>
              <td><?= $row['book_price']; ?></td>
              <td><a href="editbook.php?bookisbn=<?= $row['book_isbn']; ?>">Edit</a>
              <a href="deletebook.php?bookisbn=<?= $row['book_isbn']; ?>">Delete</a></td>
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