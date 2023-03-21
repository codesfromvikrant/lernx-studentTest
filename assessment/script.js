const menu = document.getElementById('menu-icon');
const btnContainer = document.getElementById('btn-container');

menu.addEventListener('click', function () {
  //alert('hi');
  document.getElementById('nav').classList.toggle('mobilenav');
})

async function getBtnsforTest() {
  try {
    const response = await fetch('../test.php');
    const data = await response.json();
    data.forEach(el => {
      el = JSON.parse(el);
      const button = `<button data-testid="${el._id.$oid}" class="test-btn bg-secondary border-0 shadow rounded-2 platform-border Montserrat px-3 py-2 text-secondary fw-semibold">${el.testSubject}</button>`;
      //console.log(button);
      btnContainer.insertAdjacentHTML("beforeend", button);
    });

    const testBtn = document.querySelectorAll('.test-btn');
    for (let i = 0; i < testBtn.length; i++) {
      testBtn[i].addEventListener('click', function (e) {
        e.preventDefault();

        const testID = e.target.dataset.testid;
        location.href = `../studenttest.html?testID=${testID}`;
      })
    }
    console.log(testBtn.length)
  } catch (error) {
    console.log(error);
  }
}
getBtnsforTest();