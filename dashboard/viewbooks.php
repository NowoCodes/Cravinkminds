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

include 'dashboard-nav.php' ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-4">
  <a href="add_book.php" class="mb-2 btn btn-success">Add New Book</a>
  <a href="add_acc.php" class="mb-2 btn btn-info">Add Acc Details</a>
  <a href="view_acc.php" class="mb-2 btn btn-info">View Acc Details</a>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">


    <div class="table-responsive">
      <table class="table table-sm">
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Image</th>
            <th>Description</th>
            <th>Purchase Link</th>
            <th>Price</th>
            <th>Old Price</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php
          // while ($row = mysqli_fetch_assoc($result)) : 
          ?>
          <?php
          $pquery = "SELECT * FROM register WHERE username='$cravinkuname'";
          $presult = mysqli_query($conn, $pquery);
          while ($parray = mysqli_fetch_assoc($presult)) :
            $bookId = $parray['id'];
            $cquery = "SELECT * FROM books WHERE u_id = '$bookId' ORDER BY id DESC";
            $cresult = mysqli_query($conn, $cquery);
            while ($row = mysqli_fetch_assoc($cresult)) :
          ?>
              <tr>
                <td><?= $row['book_title']; ?></td>
                <td><?= $row['book_author']; ?></td>
                <td><img src="../img/books/<?= $row['book_image']; ?>" width="100" alt="Cover Image"></td>
                <td class="text-justify"><?= $row['book_descr']; ?></td>
                <td class="text-break">
                  <a class="text-warning text-decoration-none" target="_blank" href="<?= $row['purchase_link']; ?>"><?= $row['purchase_link']; ?></a>
                </td>
                <td><?= $row['book_price']; ?></td>
                <td>
                  <?php if ($row['list_price'] != 0) : ?>
                    <strike class="text-danger"><?= $row['list_price']; ?></strike>
                  <?php elseif ($row['list_price'] == 0) : ?>
                    <span class="text-danger"><?= $row['list_price']; ?></span>
                  <?php endif; ?>
                </td>
                <td>
                  <a class="btn btn-sm btn-info" href="editbook.php?id=<?= $row['id']; ?>">Edit</a>
                  <a class="btn btn-sm btn-danger" href="deletebook.php?id=<?= $row['id']; ?>">Delete</a>
                </td>
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
<?php include '../scripts.php'; ?>
</body>

</html>