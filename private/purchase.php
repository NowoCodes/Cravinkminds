<?php
// if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
//   header('HTTP/1.0 403 Forbidden', TRUE, 403);

//   die();
// } else {
//   echo 'Welcome';
// }

if ($_GET['status'] != 'success') {
  header("Location: javascript://history.go(-1)");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paystack</title>
</head>

<body>
  <h1>Welcome son</h1>
</body>

</html>