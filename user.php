  <?php

  require_once '../vendor/autoload.php';

  $client = new MongoDB\Client("mongodb://localhost:27017");
  $collection = $client->testques->users;

  $results = $collection->find();
  $data = [];

  foreach ($results as $result) {
    array_push($data, $result);
  }

  echo json_encode($data);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $marks = $data['marks'];
    $testID = $data['testID'];

    /* $data = [
      'marksScored' => $marks
    ];*/

    $filter = [
      "username" => $username,
      'testHistory.testID' => new MongoDB\BSON\ObjectID($testID)
    ];

    $update = [
      '$set' => [
        'testHistory.$.marksScored' => $marks
      ]
    ];

    //$options = ["upsert" => true];

    // update the document
    $result = $collection->updateOne($filter, $update);

    if ($result->getModifiedCount() == 1) {
      // Update was successful
      echo "Update successful!";
    } else {
      // Update was not successful
      echo "Update failed!";
    }
  }

  /*
  
  }*/

  ?>
