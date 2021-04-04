<?php
$title = 'View Books';
$page = 'viewbooks';
session_start();
// include '../engine/conn.php';
include '../functions/db_functions.php';

if (isset($_SESSION['cravinkuname'])) {
  $cravinkuname = $_SESSION['cravinkuname'];
} else {
  header("Location:../login.php");
}

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
          <?php 
          // while ($row = mysqli_fetch_assoc($result)) : 
          ?>
          <?php 
            // $pquery = "SELECT * FROM register";
            $pquery = "SELECT * FROM register WHERE username='$cravinkuname'";
            $presult = mysqli_query($conn, $pquery);
            while($parray = mysqli_fetch_assoc($presult)): 
            $bookId = $parray['id'];
            $cquery = "SELECT * FROM books WHERE id = '$bookId' ORDER BY book_isbn DESC";
            $cresult = mysqli_query($conn, $cquery);
            while ($row = mysqli_fetch_assoc($cresult)):
          ?>
            <tr>
              <td><?= $row['book_isbn']; ?></td>
              <td><?= $row['book_title']; ?></td>
              <td><?= $row['book_author']; ?></td>
              <td><?= $row['book_image']; ?></td>
              <td class="text-justify"><?= $row['book_descr']; ?></td>
              <td><?= $row['book_price']; ?></td>
              <td><a class="btn btn-sm btn-info" href="editbook.php?bookisbn=<?= $row['book_isbn']; ?>">Edit</a>
              <a class="btn btn-sm btn-danger" href="deletebook.php?bookisbn=<?= $row['book_isbn']; ?>">Delete</a></td>
            </tr>
          <?php endwhile; ?>
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