<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Montserrat:wght@200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <title>User SignUp</title>
</head>

<body>

  <div
    class="container max-w-xl mx-auto bg-gray-100 border-[#015958] border-t-4 my-12 sm:p-16 p-8 shadow-md rounded-md">
    <h3 class="text-xl uppercase mb-4 font-extrabold text-gray-600">Log In For Test!</h3>

    <form id="signupform" action="" post="post" class="flex justify-start items-start gap-3 flex-col">

      <!--<div class="flex justify-start items-start w-full flex-col gap-1">
        <label for="username">Username* :</label>
        <input type="text" name="username" class="w-full p-3 rounded-md text-sm" placeholder="Enter Your Full Name"
          required>
      </div>-->

      <div class="flex justify-start items-start w-full flex-col gap-1">
        <label for="email">Email* :</label>
        <input type="text" name="email" id="email" class="w-full p-3 rounded-md text-sm"
          placeholder="Enter Your Valid Email" required>
      </div>

      <div class="flex justify-start items-start w-full flex-col gap-1">
        <label for="password">Password* :</label>
        <input type="password" name="password" id="password" class="w-full p-3 rounded-md text-sm"
          placeholder="Enter your Password" required>
      </div>

      <div class="">
        <label for="test" class="font-semibold text-gray-800">Choose The Test Subject :</label><br />
        <select name="test" id="test" class="input bg-gray-200 p-2 rounded-md w-full text-sm font-semibold">
        </select>
      </div>

      <!--<div class="flex justify-start items-start w-full flex-col gap-1">
        <label for="confirm-password">Confirm Password* :</label>
        <input type="password" name="confirm-password" id="confirm-password" class="w-full p-3 rounded-md text-sm"
          placeholder="Enter your Password" required>
        <p id="password-error" class="text-sm text-red-600 font-semibold"></p>
      </div>-->

      <input type="submit" class="bg-[#015958] mt-6 text-white font-medium shadow-md cursor-pointer py-2 px-10 rounded"
        value="Submit">
    </form>
  </div>

  <script>
    const form = document.getElementById('signupform');
    const inputs = document.querySelectorAll('input');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm-password');
    const email = document.getElementById('email');
    const test = document.getElementById('test');

    fetch('./question-bank/database.php')
      .then(response => response.json())
      .then(data => {
        //console.log(data)
        data.forEach((el) => {
          //console.log(el._id.$oid);
          const option = `<option value="${el._id.$oid}">${el.testSubject}</option>`;
          test.insertAdjacentHTML("beforeend", option);
        });

        const selectedOption = test.options[test.selectedIndex];
        const selectedValue = selectedOption.value;
        sessionStorage.setItem('testID', selectedValue);
      });

    test.addEventListener('change', function (e) {
      e.preventDefault();
      const selectedOption = test.options[test.selectedIndex];
      const selectedValue = selectedOption.value;
      sessionStorage.setItem('testID', selectedValue);
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      fetch('user.php')
        .then((response) => response.json())
        .then(data => {
          data.forEach(el => {
            if (el.email == email.value && el.password == password.value) {
              // changing url location to test page 
              sessionStorage.setItem('username', el.username);
              window.location.href = 'studenttest.html';
            }
          })
        })
    })
  </script>

</body>

</html>