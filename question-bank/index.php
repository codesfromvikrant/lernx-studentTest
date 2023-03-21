<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Montserrat:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <title>Questions Bank</title>
</head>

<body class="bg-gray-200">

  <header class="head-container mt-16 p-8 text-3xl text-gray-800 font-semibold bg-white border-[#015958] border-t-4 max-w-5xl rounded mx-auto">
    Students Test Builder
  </header>
  <section class="container max-w-5xl mt-2 mb-16 p-8 rounded mx-auto text-gray-700 bg-white">
    <form action="" id="test-details" method="post" class="flex justify-start items-start gap-3 flex-col">
      <div class="">
        <label for="test" class="font-semibold text-gray-800">Choose The Test Subject :</label><br />
        <select name="test" id="test" class="input bg-gray-200 p-2 rounded-md w-full text-sm font-semibold" required />
        </select>
      </div>

      <div class="w-full">
        <label for="title" class="font-semibold text-gray-800">Title :</label><br />
        <input type="text" name="title" id="title" placeholder="Enter test title" class="input border-2 border-gray-200 text-sm p-2 w-full rounded-md" required />
      </div>

      <div class="w-full">
        <label for="description" class="font-semibold text-gray-800">Description :</label><br />
        <input type="text" name="description" id="description" placeholder="Enter duration in mins" class="input border-2 border-gray-200 text-sm p-2 w-full rounded-md" />
      </div>

      <div class="">
        <label for="duration" class="font-semibold text-gray-800">Time Durations :</label><br />
        <input type="number" name="duration" id="duration" placeholder="Enter duration in mins" class="input border-2 border-gray-200 text-sm p-2 w-full rounded-md" required />
      </div>

      <div class="">
        <label for="max-marks" class="font-semibold text-gray-800">Maximum Marks for Each Question :</label><br />
        <input type="number" name="max-marks" id="max-marks" placeholder="Enter here!" class="input border-2 border-gray-200 text-sm p-2 w-full rounded-md" required />
      </div>

      <input id="submit-detail" style="background-color: var(--bg-primary);" class="text-white py-2 px-4 rounded-md cursor-pointer" type="submit" value="Submit To Add Questions">
    </form>

    <form id="question-form" action="" method="post" class="hidden">
      <p id="notice" class="text-sm  mb-4 text-green-500 font-semibold"></p>

      <label for="question" class="font-bold text-lg">Write a Question!</label>
      <textarea name="question" id="question" class="input w-full outline-[#015958] h-24 border-gray-200 border-2 p-2 rounded text-sm" placeholder="Write Here!" required></textarea>

      <div id="options" class="my-8">
        <h3 class="font-bold text-lg mb-2">Add Options for the answers</h3>
        <div class="input-row">
          <label for="" class="font-semibold text-gray-500">Option a:</label>
          <input type="text" placeholder="Enter Here!" name="Option-a" class="input option-input outline-[#015958]" required>
        </div>

        <div class="input-row">
          <label for="" class="font-semibold text-gray-500">Option b:</label>
          <input type="text" placeholder="Enter Here!" name="Option-b" class="input option-input outline-[#015958]" required>
        </div>

        <div class="input-row">
          <label for="" class="font-semibold text-gray-500">Option c:</label>
          <input type="text" placeholder="Enter Here!" name="Option-c" class="input option-input outline-[#015958]" required>
        </div>

        <div class="input-row">
          <label for="" class="font-semibold text-gray-500">Option d:</label>
          <input type="text" placeholder="Enter Here!" name="Option-d" class="input option-input outline-[#015958]" required>
        </div>
      </div>

      <!--<button id="add-option" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded mt-2 mb-4">Add more Option</button><br />-->

      <div class="input-row my-3">
        <label for="correct-option" class="font-bold">Correct Option is:</label>
        <select name="correct-option" class="input bg-[#D8FFF3] p-2 m-2 font-bold outline-[#015958] shadow cursor-pointer rounded" id="correct-option" required>
          <option value="a">a</option>
          <option value="b">b</option>
          <option value="c">c</option>
          <option value="d">d</option>
        </select>
      </div>

      <label for="explanation" class="font-bold">Explanation for the answer.</label>
      <textarea name="explanation" id="explanation" class="input w-full outline-[#015958] h-24 border-gray-200 border-2 p-2 rounded text-sm" required placeholder="Write Here!"></textarea>

      <input type="submit" class="bg-[#015958] mt-6 text-white font-semibold shadow-md cursor-pointer py-2 px-10 rounded" value="Submit">
    </form>
  </section>


  <script src="./script.js"></script>
</body>

</html>