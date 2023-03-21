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

?>

<?php ?>