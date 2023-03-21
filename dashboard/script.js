const testSubject = document.getElementById('test-subject');
const userEmail = 'chaudharyvikrant2000@gmail.com';

// mobile navigation toggle button
const menu = document.getElementById('menu-icon');
menu.addEventListener('click', function (e) {
  e.preventDefault();
  document.querySelector('.sidenav').classList.toggle('menu-bar');
})

async function getTest() {
  try {
    const response = await fetch('test-data.php');
    const data = await response.json();

    let testSubjects = [];
    data.forEach((el) => {
      testSubjects.push(el.testSubject);
      const option = `<option value="${el._id.$oid}">${el.testSubject}</option>`;
      testSubject.insertAdjacentHTML("beforeend", option);
    });

    const selectedOption = testSubject.options[testSubject.selectedIndex];
    const selectedValue = selectedOption.value;
    let testID;
    data.forEach(el => {
      if (el.testSubject == selectedValue) {
        testID = el._id.$oid;
      }
    });

    showChart(testSubjects);
    getUserData(testID);
  } catch (error) {
    console.log(error)
  }
}
getTest();


testSubject.addEventListener('change', function (event) {
  event.preventDefault();
  const selectedOption = testSubject.options[testSubject.selectedIndex];
  const selectedValue = selectedOption.value;
  getUserData(selectedValue);
})

function showChart(testSubjects) {
  fetch('users-data.php')
    .then(response => response.json())
    .then(data => {

      let Labels = testSubjects;
      let Data = [];

      data.forEach((el) => {
        el = JSON.parse(el);
        if (userEmail == el.email) {
          el.testHistory.forEach(el => {
            Data.push(el.marksScored);
          })
        }
      });

      const ctx = document.getElementById('myChart');

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: Labels,
          datasets: [{
            label: 'Marks Scored',
            data: Data,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
}


function getUserData(id) {
  fetch('users-data.php')
    .then(response => response.json())
    .then(data => {

      let userMark;
      data.forEach((el) => {
        el = JSON.parse(el)

        if (userEmail === el.email) {
          document.getElementById('name-char').innerText = el.username.charAt(0);
          document.getElementById('user-name').innerText = el.username;
          document.getElementById('user-email').innerText = el.email;

          el.testHistory.forEach((el) => {
            if (el.testID.$oid == id) {

              userMark = el.marksScored;

              document.getElementById('test-data').innerText = el.attemptDate;
              document.getElementById('mark-scored').innerText = el.marksScored;
              document.getElementById('time-taken').innerText = el.duration;
            }
          });
        }
      });

      //const user = 0;
      let usersMarks = [];

      data.forEach(el => {
        el = JSON.parse(el);
        el.testHistory.forEach(el => {
          if (el.testID.$oid == id) {
            const mark = el.marksScored;
            usersMarks.push(mark);
          }
        });
      });

      let rank = 0;
      //console.log(userMark)
      //console.log(usersMarks)

      usersMarks.forEach(el => {
        if (el < userMark) {
          rank++;
        }
      })

      let userPercentile = (rank / usersMarks.length) * 100;
      userPercentile = userPercentile.toFixed(2);

      document.getElementById('percentile').style.width = `${userPercentile}%`;
      document.getElementById('percentile').innerText = `${userPercentile}%`;
      console.log(userPercentile);
    });
};


