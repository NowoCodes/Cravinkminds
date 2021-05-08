<?php
$page = 'book';
$title = "Book - CravinkMinds";
$description = "Tired of the heart ache of wirtter's block-you want to write but can't get?..........";
include 'header.php';
include 'engine/conn.php';
include 'functions/db_functions.php';

$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id = '$id'";
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

$reviewquery = "SELECT * FROM reviews WHERE book_id = '$id' ORDER BY submit_date DESC";
$reviewresult = mysqli_query($conn, $reviewquery);
$overall = mysqli_fetch_assoc($reviewresult);

$averagequery = "SELECT AVG(rating) AS overall_rating, COUNT(*) AS total_reviews FROM reviews WHERE book_id = '$id'";
$averageresult = mysqli_query($conn, $averagequery);
$average = mysqli_fetch_assoc($averageresult);

if (isset($_POST['review'])) {
	$name = $_POST['name'];
	$content = $_POST['content'];
	$rating = $_POST['rating'];

	$query = "INSERT INTO reviews (book_id, name, content, rating, submit_date)
			  VALUES ('$id', '$name', '$content', '$rating', NOW())";
	$result = mysqli_query($conn, $query);

	header('Location: book.php?id=' . $id);
}

?>

<div class="container px-5">
	<p class="lead mt-4"><a href="books.php">Books</a> > <?= $row['book_title']; ?></p>
	<div class="row">
		<div class="col-md-3 text-center mb-3">
			<img class="img-responsive img-thumbnail" src="./img/books/<?= $row['book_image']; ?>">
		</div>
		<div class="col-md-9">
			<h4>Book Description</h4>
			<p class="text-justify"><?= $row['book_descr']; ?></p>
			<h4>Book Details</h4>
			<table class="table">
				<tbody>
					<tr>
						<td>Author</td>
						<td><?= $row['book_author'] ?></td>
					</tr>
					<tr>
						<td>Uploaded By</td>
						<td>
							<?php
							$bookId = $row['u_id'];
							$rquery = "SELECT * FROM register WHERE id = '$bookId'";
							$cresult = mysqli_query($conn, $rquery);
							$rrow = mysqli_fetch_assoc($cresult);
							echo $rrow['name'];

							$path = 'purchase/books/' . $row['ebook'];
							$pdf = file_get_contents($path);
							$pagenumber = preg_match_all("/\/Page\W/", $pdf, $dummy);
							$getwords = preg_replace('/\s+/', ' ', trim($pdf));
							$words = explode(" ", $getwords);
							$totalwords = count($words);
							$rounded = ceil($totalwords / 160);
							?>
						</td>
					</tr>
					<tr>
						<td>Upload Date</td>
						<td><?= pretty_date($row['created_at']); ?></td>
					</tr>
					<tr>
						<td>Old Price</td>
						<td><strike class="text-red">&#8358;<?= $row['list_price']; ?></strike></td>
					</tr>
					<tr>
						<td>New Price</td>
						<td>&#8358;<?= $row['book_price'] ?></td>
					</tr>
				</tbody>
			</table>
			<div class="mb-4 container">
				<div class="row">
				<span class="col-2 text-center">
						<p class="fa-3x">&#128196;</p>
						<p class="mt-n4 font-weight-bold" style="font-size:18px;"><?= $pagenumber; ?></p>
						<p class="mt-n4">
						<?= ($pagenumber == 1) ? 'Page' : 'Pages'; ?>
						</p>
				</span>
				<span class="col-7 text-center">
						<p class="fa-3x">&#x1F551;</p>
						<p class="mt-n4 font-weight-bold" style="font-size:18px;"><?= $rounded - 1 . ' - ' . $rounded; ?></p>
						<p class="mt-n4">Minutes read</p>
				</span>
				<span class="col-2 text-center">
						<p class="fa-3x">&#128214;</p>
						<p class="mt-n4 font-weight-bold" style="font-size:18px;"><?= $totalwords; ?></p>
						<p class="mt-n4">Words</p>
				</span>
				</div>
			</div>


			<?php if (!empty($row['purchase_link'])) : ?>
				<a role="button" target="_blank" href="<?= $row['purchase_link']; ?>" class="btn btn-success mb-4 text-decoration-none text-white"> Purchase </a>
			<?php else : ?>

				<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#payForm">Purchase</button>

			<?php endif; ?>

			<hr>

			<div class="mt-3">
				<div class="overall_rating">
					<span  style="font-size:18px;"><?= $average['overall_rating'] == 0 ? '' : number_format($average['overall_rating'], 1); ?></span>
					<span style="font-size:18px; color: teal;"><?= str_repeat('&#9733;', round($average['overall_rating'])) ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style="font-size:18px;"><?= $average['total_reviews'] == 1  ? $average['total_reviews'].' review' : $average['total_reviews'].' reviews'; ?></span>
				</div>

				<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#ratings">Write Review</button>

				<hr>

				<div class="row">
					<?php foreach ($reviewresult as $review) : ?>
						<div class="col-6">
							<div class="review">
								<h3 class="name" style="font-size:20px;"><?= htmlspecialchars($review['name'], ENT_QUOTES) ?></h3>
								<div class="mt-n3">
									<span style="font-size:18px; color: teal;"><?= str_repeat('&#9733;', $review['rating']) ?></span>
									<span class="date"><sub><?= time_elapsed_string($review['submit_date']) ?></sub></span>
								</div>
								<p class="content" style="font-size:14px;"><?= htmlspecialchars($review['content'], ENT_QUOTES) ?></p>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>

		</div>
	</div>
</div>

<!--Modals -->

<!-- Payment Modal -->
<div class="modal fade" id="payForm">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Make Payment</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form id="paymentForm">
					<!-- <form id="paymentForm" action="pay.php" method="POST"> -->
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email-address" required>
					</div>
					<div class="form-group">
						<!-- <label for="amount">Amount</label> -->
						<input type="hidden" id="book_id" value="<?= $row['id']; ?>">
						<input type="hidden" class="form-control" id="amount" value="<?= $row['book_price']; ?>" required />
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<div class="form-group">
								<label for="first-name">First Name</label>
								<input type="text" class="form-control" id="first-name" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="last-name">Last Name</label>
								<input type="text" class="form-control" id="last-name" />
							</div>
						</div>
					</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" onclick="payWithPaystack()"> Pay </button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

			</form>
		</div>
	</div>
</div>
<!-- Payment Modal -->

<!-- Rating Modal -->
<div class="modal fade" id="ratings">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Write Review</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="book.php?id=<?= $row['id']; ?>" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input name="name" class="form-control" type="text" required>
					</div>
					<div class="form-group">
						<!--                        <input name="rating" class="form-control" type="number" min="1" max="5" placeholder="Rating (1-5)" required>-->
						<label for="rating">Rate</label>
						<select name="rating" class="form-control">
							<?php for ($i = 1; $i <= 5; $i++) : ?>
								<option value="<?= $i; ?>"><?= $i; ?></option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="last-name">Write Review Here</label>
						<textarea name="content" class="form-control" required></textarea>
					</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" name="review">Submit Review</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</form>
			</div>

		</div>
	</div>
</div>
<!-- Rating Modal -->

<!-- Page Footer-->
<?php include 'footer.php'; ?>

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
	const paymentForm = document.getElementById('paymentForm');
	paymentForm.addEventListener("submit", payWithPaystack, false);

	function payWithPaystack(e) {
		e.preventDefault();
		let handler = PaystackPop.setup({
			key: 'pk_test_21817dec44e03c6736666c8196ecda193d8c9f9e', // Replace with your public key
			email: document.getElementById("email-address").value,
			amount: document.getElementById("amount").value * 100,
			ref: 'CIM' + Math.floor((Math.random() * 1000000000) + 1),
			metadata: {
				book_id: document.getElementById("book_id").value,
				last_name: document.getElementById("last-name").value,
				first_name: document.getElementById("first-name").value,
			},
			// label: "Optional string that replaces customer email"
			onClose: function() {
				alert('Transaction was not completed, window closed.');
			},
			callback: function(response) {
				let reference = response.reference;
				let message = 'Payment complete! Reference: ' + reference;
				alert(message);
				// window.location = "https://www.cravinkminds.com/verify_transaction.php?reference=" + reference
				window.location = "http://localhost/cravinkminds/verify_transaction.php?reference=" + reference;
			},
		});

		handler.openIframe();

	}
</script>
</body>

</html>