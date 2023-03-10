const form = document.getElementById('question-form');
let quesSubmitted;

fetch('test.php')
  .then(response => response.json())
  .then(data => { quesSubmitted = data.length })

form.addEventListener('submit', function (e) {
  e.preventDefault();
  console.log('hello')
  submitForm()
})

function submitForm() {
  let xhttp = new XMLHttpRequest();
  xhttp.open('POST', 'database.php', true);


  xhttp.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // handle response from server
      quesSubmitted++;
      document.getElementById('notice').innerText = `* Question ${quesSubmitted} added to the database successfully now you can add question ${quesSubmitted + 1} to it.`;
    }
  }

  let formData = new FormData(form);

  xhttp.send(formData);

  const inputs = document.querySelectorAll('.input');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].value = '';
  }

}
