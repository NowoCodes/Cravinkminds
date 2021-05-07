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
<div class="container mb-5 mt-3 text-justify">

  <?php for ($i = 0; $i < mysqli_num_rows($result); $i++) : ?>
    <div class="row">
      <?php
      while ($query_row = mysqli_fetch_assoc($result)) :
        $id = $query_row['id'];
        $averagequery = "SELECT AVG(rating) AS overall_rating, COUNT(*) AS total_reviews FROM reviews WHERE book_id = '$id'";
        $averageresult = mysqli_query($conn, $averagequery);
        $average = mysqli_fetch_assoc($averageresult);
      ?>
        <div class="col-md-3 col-sm-4 col-6">
          <a href="book.php?id=<?= $query_row['id']; ?>">
            <img class="img-responsive img-thumbnail" style="height: 300px; width:300px;" src="./img/books/<?= $query_row['book_image']; ?>">
          </a>
          <h5 class="mt-1"><?= $query_row['book_title']; ?></h5>
          <h6 class="font-weight-bold text-secondary"><?= $query_row['book_author'] ?></h6>
          <p class="mt-n2 font-size-16" style="color: teal;"><?= str_repeat('&#9733;', round($average['overall_rating'])) ?></p>
          <h6 class="mt-n3 font-weight-light">N<?= $query_row['book_price'] ?></h6>
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