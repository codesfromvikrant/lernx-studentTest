<?php
// Load the MongoDB PHP driver
require_once '../vendor/autoload.php';

// Connecting to mongoDB Server
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select a database and a collection
$collection = $client->testques->bca;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo "hello";
  // Retrieve the form data
  $question = $_POST['question'];
  $optionA = $_POST['Option-a'];
  $optionB = $_POST['Option-b'];
  $optionC = $_POST['Option-c'];
  $optionD = $_POST['Option-d'];
  $correctOption = $_POST['correct-option'];
  $explanation = $_POST['explanation'];

  $questionExist = $collection->findOne(['question' => $question]);
  if ($questionExist) {
    echo "Question already exist!";
  } else {
    $data = [
      'question' => $question,
      'optionA' => $optionA,
      'optionB' => $optionB,
      'optionC' => $optionC,
      'optionC' => $optionC,
      'correctOPtion' => $correctOption,
      'explanation' => $explanation
    ];

    // Insert the new user document into the database
    $insertResult = $collection->insertOne($data);

    // Check if the insertion was successful
    if ($insertResult->getInsertedCount() == 1) {
      echo "User created successfully";
    } else {
      echo "Failed to create user";
    }
  }
}

?>

<?php
?>