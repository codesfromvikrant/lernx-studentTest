  <?php

  require_once '../vendor/autoload.php';

  $client = new MongoDB\Client("mongodb://localhost:27017");
  $collection = $client->testques->users;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm-password'];

    $collection->insertOne([
      'username' => $username,
      'email' => $email,
      'password' => $password,
    ]);

    echo 'User created successfully.';
  }

  ?>
