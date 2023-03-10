const startTest = document.getElementById('start-test');
const container = document.getElementById('form-container');
const testBtn = document.getElementById('test-btn');
const submitTest = document.getElementById('submit-test')
const options = document.querySelectorAll('.options');
const totalQuestions = document.getElementById('total-questions')
const nextQues = document.getElementById('next-question');

const videoPreview = document.getElementById("video-preview");

let testData;

let quesCount = 0;

function attempted() {
  let attempts = document.querySelectorAll('.attempts');
  for (let i = 0; i < attempts.length; i++) {
    const property = attempts[i].innerHTML;
    if (sessionStorage.hasOwnProperty(property)) {
      attempts[i].style.backgroundColor = "#ef4444";
    }
  }
}

function saveAnswer(key, value) {
  sessionStorage.setItem(key, value);

  attempted();
}

const duration = {
  hours: 2,
  minutes: 30
};

// Fetching question from the server
function fetchQuestions(i = quesCount) {
  quesCount = i;

  fetch('test.php')
    .then(response => response.json())
    .then(data => {

      console.log(quesCount)


      container.innerHTML = '';
      if (quesCount == data.length) {
        document.getElementById('submit-alert').innerHTML = "Submit Your test now!";
        nextQues.style.display = "none";
        return;
      }

      el = JSON.parse(data[quesCount]);

      const quesHTML = `<div class="quesHTML bg-gray-100 text-gray-700 my-4 p-4 rounded">
      <p class="mb-2 text-lg font-semibold">Question ${i + 1} : ${el.question}</p>
      <span>
      <input onchange="saveAnswer(${i + 1}, this.id)" type="radio" value="a" name="ans-${i + 1}" id="a-${i + 1}">
      <label for="a">(A) ${el.optionA}</label>
      </span><br />
      
      <span>
      <input onchange="saveAnswer(${i + 1}, this.id)" type="radio" value="b" name="ans-${i + 1}" id="b-${i + 1}">
      <label for="b">(B) ${el.optionB}</label>
      </span><br />
      
      <span>
      <input onchange="saveAnswer(${i + 1}, this.id)" type="radio" value="c" name="ans-${i + 1}" id="c-${i + 1}">
      <label for="c">(C) ${el.optionC}</label>
      </span><br />
      
      <span>
      <input onchange="saveAnswer(${i + 1}, this.id)" type="radio" value="d" name="ans-${i + 1}" id="d-${i + 1}">
      <label for="c">(D) ${el.optionD}</label>
      </span>
      </div>`;

      container.insertAdjacentHTML("beforeend", `${quesHTML}`);

      // restoring saved answer from session storage
      function restoreAnswers() {
        let id = quesCount + 1;
        if (sessionStorage[id]) {
          document.getElementById(sessionStorage[id]).checked = true;
        }
      }
      restoreAnswers();
    });
}

// Displaying next question on next button
nextQues.addEventListener('click', function (e) {
  e.preventDefault();
  quesCount++;
  fetchQuestions();
});

startTest.addEventListener('click', function (e) {
  e.preventDefault();

  // fullscreen browser for test
  const element = document.documentElement; // Get the HTML element
  if (element.requestFullscreen) {
    element.requestFullscreen(); // Request full screen mode
  } else if (element.webkitRequestFullscreen) { // Safari
    element.webkitRequestFullscreen();
  } else if (element.msRequestFullscreen) { // IE11
    element.msRequestFullscreen();
  }

  // Opeing web cam
  const constraints = {
    video: true // Request video from the user's camera
  };

  navigator.mediaDevices.getUserMedia(constraints)
    .then(stream => {
      videoPreview.srcObject = stream; // Set the video stream as the source of the video element
      videoPreview.play(); // Play the video
    })
    .catch(error => {
      console.error(error); // Handle errors
    });

  document.getElementById('test-info').style.display = "none";
  document.getElementById('test-detail').style.display = "block";
  testBtn.style.display = 'flex';

  fetch('test.php')
    .then(response => response.json())
    .then(data => {

      for (let i = 0; i < data.length; i++) {
        const quesIcon = `<div onclick="fetchQuestions(${i})" class="attempts w-6 h-6 bg-gray-600 rounded cursor-pointer flex justify-center items-center text-white">${i + 1}</div>`;
        totalQuestions.insertAdjacentHTML("beforeend", quesIcon)
      }

      attempted();
    });


  fetchQuestions();

  // Setting timmer for test
  const durationInSeconds = duration.hours * 60 * 60 + duration.minutes * 60;

  const timerElement = document.getElementById("timer");
  let timeRemaining = durationInSeconds;

  const intervalId = setInterval(() => {

    timeRemaining--;

    if (timeRemaining <= 0) {
      clearInterval(intervalId);
      document.getElementById('timer') = "Time's up!";
    } else {
      // Update the timer display
      const hours = Math.floor(timeRemaining / 3600);
      const minutes = Math.floor((timeRemaining % 3600) / 60);
      const seconds = timeRemaining % 60;
      timerElement.textContent = `Time Remaining : ${hours.toString().padStart(2, "0")}: ${minutes.toString().padStart(2, "0")}: ${seconds.toString().padStart(2, "0")}`;
    }
  }, 1000);

});

let testScore = 0;
submitTest.addEventListener('click', function (e) {
  e.preventDefault()
  document.getElementById('test-detail').style.display = "none"

  fetch('test.php')
    .then(response => response.json())
    .then(data => {
      data.forEach((el, i) => {
        el = JSON.parse(el);
        console.log(el.correctOption)

        if (sessionStorage.hasOwnProperty(i + 1) && sessionStorage[i + 1].charAt(0) == el.correctOption) {
          //console.log(i)
          testScore++;
        }
      })

      form.style.display = "none";
      document.getElementById('score').innerHTML = `Your Score is ${testScore}.`
    })

})




