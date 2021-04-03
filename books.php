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
          <a href="book.php?bookisbn=<?= $query_row['book_isbn']; ?>">
            <img class="img-responsive img-thumbnail" src="./img/books/<?= $query_row['book_image']; ?>">
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



  <div class="card-deck  text-center">

    <div class="card">
      <img class="card-img-top" src="img/books/book1.jpeg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title text-center">Learn Creative writing</h5>
        <p class="card-text">Learn Creative writing: A guide to writing Perfect Drafts. (By Adewale Joel)
        </p>
        <a href="https://amzn.to/3kZ9tVZ" class="btn-lg hover text-white text-uppercase btn-block btn" target="_blank">Buy on Amazon</a>
        <a href="https://paystack.com/pay/cravinkmindsbook" class="btn-lg hover text-white text-uppercase btn-block btn" target="_blank">Get Digital copy now</a>
      </div>
    </div>

    <div class="card">
      <img class="card-img-top" src="img/books/book2.jpeg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title text-center">Why You have writer’s Block</h5>
        <p class="card-text">Why You have writer’s Block and how to tackle it. (By Adewale Joel)</p>
        <a href="https://paystack.com/pay/wyhwb" class="btn-lg hover text-white text-uppercase btn-block btn" target="_blank">Get Digital copy now</a>
      </div>
    </div>

  </div>


</div>

<!-- Page Footer-->
<?php include 'footer.php'; ?>

</body>

</html>