<?php
session_start();

require_once '../../vendor/autoload.php';

// Establishing a connection
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select the database
$db = $client->testques;
$collection = $db->tests;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve the form data
  $question = $_POST['question'];
  $optionA = $_POST['Option-a'];
  $optionB = $_POST['Option-b'];
  $optionC = $_POST['Option-c'];
  $optionD = $_POST['Option-d'];
  $correctAns = $_POST['correct-option'];
  $explanation = $_POST['explanation'];

  $testID = $_POST['testID'];

  $data = [
    'question' => $question,
    'a' => $optionA,
    'b' => $optionB,
    'c' => $optionC,
    'd' => $optionD,
    'correctAns' => $correctOption,
    'explanation' => $explanation
  ];


  $filter = ['_id' => new MongoDB\BSON\ObjectID($testID)];

  $update = ['$push' => ['questionBank' => $data]];

  //$options = ['upsert' => false];

  // Update the document
  $updateResult = $collection->updateOne($filter, $update);

  // Check if the update was successful
  if ($updateResult->getModifiedCount() == 1) {
    echo "Data was inserted into the array field.";
  } else {
    echo "Failed to insert data into the array field.";
  }
}
?>

<?php ?>