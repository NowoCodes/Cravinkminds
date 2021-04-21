<?php
$page = 'books';
$title = "Books - CravinkMinds";
$description = "Tired of the heart ache of wirtter's block-you want to write but can't get?..........";
include 'header.php';
include 'engine/conn.php';

$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
if (!$result) {
  echo "Can't retrieve data " . mysqli_error($conn);
  exit;
}
?>

<h1 class="container-fluid p-4 text-center text-white " style="background: #053a42;">COMMUNITY BOOKS</h1>
<div class="container mb-5 mt-3">

  <?php for ($i = 0; $i < mysqli_num_rows($result); $i++) : ?>
    <div class="row">
      <?php while ($query_row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-md-3">
          <a href="book.php?id=<?= $query_row['id']; ?>">
            <img class="img-responsive img-thumbnail" style="height: 300px; width:300px;" src="./img/books/<?= $query_row['book_image']; ?>">
          </a>
          <p><?= $query_row['book_title']; ?></p>
        </div>
      <?php
        $count++;
        if ($count >= 4) {
          $count = 0;
          break;
        }
      endwhile; ?>
    </div>
  <?php endfor; ?>
</div>

<!-- Page Footer-->
<?php include 'footer.php'; ?>

</body>

</html>