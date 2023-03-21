<?php

require_once '../../vendor/autoload.php';

// Establishing a connection
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select the database
$db = $client->testques;
$collection = $db->tests;

$results = $collection->find();
$data = [];

foreach ($results as $result) {
  array_push($data, $result);
}

echo json_encode($data);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $testID = $_POST['test'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $timeDuration = $_POST['duration'];
  $maximumMarks = $_POST['max-marks'];

  $data = [
    'title' => $title,
    'description' => $description,
    'totalDuration' => $timeDuration,
    'markPerQues' => $maximumMarks
  ];

  echo $testID;

  //$result = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($testID)]);

  //$id = new MongoDB\BSON\ObjectId($testID);
  $filter = ["_id" => new MongoDB\BSON\ObjectID($testID)];

  // Specify the options
  $options = ["upsert" => true];

  $result = $collection->updateOne($filter, ['$set' => $data], $options);

  if ($result->getModifiedCount() == 1) {
    // Update was successful
    echo "Update successful!";
  } else {
    // Update was not successful
    echo "Update failed!";
  }
}

?>

<?php ?>
