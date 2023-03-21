<?php

require_once '../../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

$collection = $client->testques->users;

$results = $collection->find();

$data = [];

foreach ($results as $result) {
  $result = json_encode($result);
  array_push($data, $result);
}

echo json_encode($data);

?>

<?php ?>