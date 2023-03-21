const startTest = document.getElementById('start-test');
const container = document.getElementById('form-container');
const testBtn = document.getElementById('test-btn');
const submitTest = document.getElementById('submit-test')
const options = document.querySelectorAll('.options');
const totalQuestions = document.getElementById('total-questions')
const nextQues = document.getElementById('next-question');

// For Test Details Page
const testTitle = document.getElementById('test-title');
const testDescription = document.getElementById('test-description');
const markperQues = document.getElementById('marksPerQues');
const hours = document.getElementById('hours');
const minutes = document.getElementById('minutes');

const videoPreview = document.getElementById("video-preview");

let testData;

// retrieving testID from query string
const queryString = window.location.search;
console.log(queryString);

const urlParams = new URLSearchParams(queryString);

const testID = urlParams.get('testID');
const username = sessionStorage.getItem('username');


let quesCount = 0;

function attempted() {
  let attempts = document.querySelectorAll('.attempts');
  for (let i = 0; i < attempts.length; i++) {
    const property = attempts[i].innerHTML;
    if (sessionStorage.hasOwnProperty(property)) {
      attempts[i].style.backgroundColor = "#ef4444";
      attempts[i].style.color = "white";
    }
  }
}

function saveAnswer(key, value) {
  sessionStorage.setItem(key, value);

  attempted();
}



async function testDetailPage() {
  try {
    const response = await fetch('test.php');
    const data = await response.json();

    data.forEach(el => {
      el = JSON.parse(el);
      if (el._id.$oid == testID) {
        testTitle.innerText = el.title;
        testDescription.innerText = el.description;
        markperQues.innerText = el.markPerQues;
        hours.innerText = (Number(el.totalDuration) / 60);
        minutes.innerText = (Number(el.totalDuration) % 60);
      }
    })
  }
  catch (error) {
    console.log(error);
  }
};
testDetailPage();

const duration = {
  hours: 0,
  minutes: 0
};

// Fetching question from the server
function fetchQuestions(i = quesCount) {
  quesCount = i;

  fetch('test.php')
    .then(response => response.json())
    .then(data => {
      data.forEach(el => {
        el = JSON.parse(el)
        if (el._id.$oid == testID) {

          duration.hours = (Number(el.totalDuration) / 60);
          duration.minutes = (Number(el.totalDuration) % 60);

          container.innerHTML = '';
          if (quesCount == el.questionBank.length) {
            document.getElementById('submit-alert').innerHTML = "Submit Your test now!";
            nextQues.style.display = "none";
            return;
          }
          el = el.questionBank[quesCount];
          //console.log(el)

          const quesHTML = `<div class="quesHTML h-full bg-gray-100 text-gray-700 my-4 px-6 py-8 rounded">
          <p class="mb-2 md:text-lg text-base font-semibold">Question ${i + 1} : ${el.question}</p>
          <div class="my-2">
          <input onchange="saveAnswer(${i + 1}, this.id)" type="radio" value="a" name="ans-${i + 1}" id="a-${i + 1}">
          <label for="a">${el.a}</label>
          </div>
          
          <div class="my-2">
          <input onchange="saveAnswer(${i + 1}, this.id)" type="radio" value="b" name="ans-${i + 1}" id="b-${i + 1}">
          <label for="b">${el.b}</label>
          </div>
          
          <div class="my-2">
          <input onchange="saveAnswer(${i + 1}, this.id)" type="radio" value="c" name="ans-${i + 1}" id="c-${i + 1}">
          <label for="c">${el.c}</label>
          </div>
          
          <div class="my-2">
          <input onchange="saveAnswer(${i + 1}, this.id)" type="radio" value="d" name="ans-${i + 1}" id="d-${i + 1}">
          <label for="c">${el.d}</label>
          </div>
          </div>`;

          container.insertAdjacentHTML("beforeend", `${quesHTML}`);
        }
      });

      // restoring saved answer from session storage
      function restoreAnswers() {
        let id = quesCount + 1;
        if (sessionStorage[id]) {
          document.getElementById(sessionStorage[id]).checked = true;
        }
      }
      restoreAnswers();

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
}

// Displaying next question on next button
nextQues.addEventListener('click', function (e) {
  e.preventDefault();
  quesCount++;
  fetchQuestions();
});

startTest.addEventListener('click', function (e) {
  e.preventDefault();

  document.getElementById('pop-up').style.display = 'block';
  document.querySelector('.close').addEventListener('click', function () {
    document.getElementById('pop-up').style.display = 'none';
  })

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

      data.forEach(el => {
        el = JSON.parse(el);

        if (el._id.$oid == testID) {
          for (let i = 0; i < el.questionBank.length; i++) {
            const quesIcon = `<div onclick="fetchQuestions(${i})" class="attempts w-7 h-7 bg-white rounded-full cursor-pointer flex justify-center items-center text-gray-700 text-xs font-bold">${i + 1}</div>`;
            totalQuestions.insertAdjacentHTML("beforeend", quesIcon)
          }
        }
      })

      attempted();
    });


  fetchQuestions();
});

let testScore = 0;
submitTest.addEventListener('click', function (e) {
  e.preventDefault();

  document.getElementById('test-detail').style.display = "none"

  fetch('test.php')
    .then(response => response.json())
    .then(data => {
      let marksPerQues;
      data.forEach(el => {
        el = JSON.parse(el);

        if (el._id.$oid == testID) {
          marksPerQues = Number(el.markPerQues);
          el.questionBank.forEach((el, i) => {
            if (sessionStorage.hasOwnProperty(i + 1) && sessionStorage[i + 1].charAt(0) == el.correctAns) {
              //console.log(i)
              testScore++;
            }
          })
        }
      });

      setMarks(testScore * marksPerQues);
      form.style.display = "none";
      document.getElementById('score').innerHTML = `Your Score is ${testScore}.`
    });

  async function setMarks(marks) {
    const data = {
      marks: marks,
      username: username,
      testID: testID
    };
    console.log(data);

    fetch('user.php', {
      method: 'POST',
      body: JSON.stringify(data),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(el => {
        sessionStorage.removeItem('testID');
        sessionStorage.removeItem('username');
      })
      .catch(error => console.log(error));
  }

  location.href = './dashboard';

});

window.onblur = function () {
  // sessionStorage.clear();
  //location.href = './user-login.php';
};
/*
window.addEventListener("beforeunload", function (event) {
  // Cancel the event as stated by the standard.
  event.preventDefault();
  this.alert('Are you sure you want to keave?')
  // Chrome requires returnValue to be set.
  event.returnValue = '';

  // Display a confirmation message
  event.returnValue = 'Are you sure you want to leave?';
});
*/
