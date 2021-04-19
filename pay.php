<?php

if (isset($_POST)) {
  $fname = $_POST['first-name'];
  $lname = $_POST['last-name'];
  $email = $_POST['email-address'];
  $amount = $_POST['amount'];

  $url = "https://api.paystack.co/transaction/initialize";

  $fields = [
    // 'email' => $email,
    // 'amount' => $amount,


    'email' => 'jane@gmail.com',
    'amount' => '9000',
  ];

  $fields_string = http_build_query($fields);

  //open connection
  $ch = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_87a34498d6a904890ded7ee70cdac23bb722e319",
    "Cache-Control: no-cache",
  ));

  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  //execute post
  $result = curl_exec($ch);
  echo $result;
}
