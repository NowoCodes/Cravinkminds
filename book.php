<?php
$page = 'book';
$title = "Book - CravinkMinds";
$description = "Tired of the heart ache of wirtter's block-you want to write but can't get?..........";
include 'header.php';
include 'engine/conn.php';

$book_isbn = $_GET['bookisbn'];
$query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
$result = mysqli_query($conn, $query);
if (!$result) {
  echo "Can't retrieve data " . mysqli_error($conn);
  exit;
}

$row = mysqli_fetch_assoc($result);
if (!$row) {
  echo "Empty book";
  exit;
}
?>

<p class="lead ml-4 mt-4"><a href="books.php">Books</a> > <?= $row['book_title']; ?></p>
<div class="row">
  <div class="col-md-3 text-center">
    <img class="ml-3 img-responsive img-thumbnail" src="./img/books/<?= $row['book_image']; ?>">
  </div>
  <div class="col-md-6">
    <h4>Book Description</h4>
    <p class="text-justify"><?= $row['book_descr']; ?></p>
    <h4>Book Details</h4>
    <table class="table">
      <tbody>
        <tr>
          <td>ISBN</td>
          <td><?= $row['book_isbn'] ?></td>
        </tr>
        <tr>
          <td>Author</td>
          <td><?= $row['book_author'] ?></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><?= $row['book_price'] ?></td>
        </tr>

      </tbody>
    </table>
    <!-- <form method="post" action="cart.php">
      <input type="hidden" name="bookisbn" value="<?= $book_isbn; ?>">
      <input type="submit" value="Purchase" name="purchase" class="btn btn-success mb-4">
    </form> -->
    <a role="button" target="_blank" href="<?= $row['purchase_link']; ?>" class="btn btn-success mb-4 text-decoration-none">Purchase</a>
  </div>
</div>


</div>

<!-- Page Footer-->
<?php include 'footer.php'; ?>

</body>

</html>