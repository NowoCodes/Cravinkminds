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
          <td>Publisher</td>
          <td><?php 
          $publisher_result = mysqli_query($conn, $query);
          while ($parray = mysqli_fetch_assoc($publisher_result)) :
            $bookId = $parray['id'];
            $rquery = "SELECT name FROM register WHERE id = '$bookId'";
            $cresult = mysqli_query($conn, $rquery);
              $rrow = mysqli_fetch_assoc($cresult);
              echo $rrow['name'];
            endwhile;

          ?></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><?= $row['book_price'] ?></td>
        </tr>

      </tbody>
    </table>
    <a role="button" target="_blank" href="<?= $row['purchase_link']; ?>" class="btn btn-success mb-4 text-decoration-none">Purchase</a>
  </div>
</div>


</div>

<!-- Page Footer-->
<?php include 'footer.php'; ?>

</body>

</html>