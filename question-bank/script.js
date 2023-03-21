const test = document.getElementById('test');
const submitDetail = document.getElementById('submit-detail');
const form = document.getElementById('test-details');
const questionForm = document.getElementById('question-form');
const inputs = document.querySelectorAll('.input');

let quesSubmitted;

fetch('database.php')
  .then(response => response.json())
  .then(data => {
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
})

form.addEventListener('submit', function (e) {
  e.preventDefault();

  let testID = sessionStorage.getItem('testID');
  let formData = new FormData(form);
  formData.append('testID', testID);
  //alert('hello')

  fetch('database.php', {
    method: 'POST',
    body: formData
  }).then(() => {
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].value = '';
    }
    //sessionStorage.setItem('testChoosed', true);
    form.style.display = 'none';
    questionForm.classList.remove('hidden');
  })
    .catch(error => console.log(error));

  fetch('database.php')
    .then(response => response.json())
    .then(data => {
      data.forEach(el => {
        let testID = sessionStorage.getItem('testID');
        //console.log(testID)
        if (el.testSubject == testID) {
          quesSubmitted = el.questionBank.length;
          //console.log(quesSubmitted);
        }
      })
    })
});

questionForm.addEventListener('submit', function (e) {
  e.preventDefault();

  let formData = new FormData(questionForm);

  fetch('test-ques.php', {
    method: 'POST',
    body: formData
  }).then((response) => {
    console.log(response);

    const inputs = document.querySelectorAll('.input');
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].value = '';
    };

    quesSubmitted++;
    document.getElementById('notice').innerText = `* Question ${quesSubmitted} added to the database successfully now you can add question ${quesSubmitted + 1} to it.`;
  })
})