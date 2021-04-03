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
    <img class="img-responsive img-thumbnail" src="./image/<?= $row['book_image']; ?>">
  </div>
  <div class="col-md-6">
    <h4>Book Description</h4>
    <p class="text-justify"><?= $row['book_descr']; ?></p>
    <h4>Book Details</h4>
    <table class="table">
      <?php foreach ($row as $key => $value) {
        if ($key == "book_descr" || $key == "book_image" || $key == "publisherid" || $key == "book_title") {
          continue;
        }
        switch ($key) {
          case "book_isbn":
            $key = "ISBN";
            break;
          case "book_title":
            $key = "Title";
            break;
          case "book_author":
            $key = "Author";
            break;
          case "book_price":
            $key = "Price";
            break;
        }
      ?>
        <tr>
          <td><?= $key; ?></td>
          <td><?= $value; ?></td>
        </tr>
      <?php
      }
      if (isset($conn)) {
        mysqli_close($conn);
      }
      ?>
    </table>
    <form method="post" action="cart.php">
      <input type="hidden" name="bookisbn" value="<?= $book_isbn; ?>">
      <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-success mb-4">
    </form>
  </div>
</div>




</div>

<!-- Page Footer-->
<?php include 'footer.php'; ?>

</body>

</html>