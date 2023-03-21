<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css" />

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/ccd3ee6b59.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Montserrat:wght@200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Dashboard</title>
</head>

<body>

  <div id="menu-icon" class="bg-white shadow-lg  fs-3 py-1 px-2 rounded-3">
    <i class="fa-solid fa-bars"></i>
  </div>

  <section class="container-fluid">
    <div class="row">
      <div style="background-color: var(--secondary);" class="sidenav col-md-2 col-9 h-100vh py-4">
        <img src="./images/logo.png" class="w-50 mx-auto" alt="">

        <nav class="mt-4 text-secondary fs-6  Montserrat  d-flex justify-content-between align-items-start flex-column">
          <ul class="w-100">
            <li class="py-2 px-3 nav-hoverEffect">
              <i class="fa-sharp fa-solid fa-house"></i>
              <a href="" class="fw-semibold">Home</a>
            </li>

            <li class="py-2 px-3 nav-hoverEffect">
              <i class="fa-sharp fa-solid fa-note-sticky"></i>
              <a href="" class="fw-semibold">Notes</a>
            </li>

            <li class="py-2 px-3 nav-hoverEffect">
              <i class="fa-solid fa-graduation-cap"></i>
              <a href="" class="fw-semibold">Courses</a>
            </li>

            <li class="py-2 px-3 nav-hoverEffect">
              <i class="fa-sharp fa-solid fa-briefcase"></i>
              <a href="" class="fw-semibold">Explore Jobs</a>
            </li>

            <li class="py-2 px-3 nav-hoverEffect">
              <i class="fa-sharp fa-solid fa-file-lines"></i>
              <a href="" class="fw-semibold">Assessment</a>
            </li>

            <li class="py-2 px-3 nav-hoverEffect">
              <i class="fa-solid fa-phone"></i>
              <a href="" class="fw-semibold">Support</a>
            </li>
          </ul>

          <button style="background-color: var(--primary);"
            class="btn text-white fw-semibold px-1 w-full mt-4 mx-auto">Sign
            Out</button>
        </nav>
      </div>

      <div class="col h-100vh overflow-y-scroll m-0">
        <div style="background-color: var(--greyish);" class="head m-0 pt-4 px-md-5 px-2 w-100">
          <h3 style="color: var(--primary);" class="Montserrat text-uppercase fs-4 fw-bolder">Student Result Analysis
          </h3>

          <nav class="mt-3 fw-medium">
            <button class="p-2 nav-active">Overview</button>
            <button class="p-2">Solutions</button>
          </nav>
        </div>

        <section class="col-xl-8 col-md-10 col-12 mx-auto">
          <div class="mt-5 max-content">
            <label for="test-subject" class="fw-bold Montserrat">Choose The Test Subject :</label><br />
            <select style="background-color: var(--secondary);" name="test-subject" id="test-subject"
              class="w-100 p-2 text-secondary fw-bold rounded-2">
            </select>
          </div>

          <div class="row px-3 mt-4 gap-3">
            <div class="col-sm col-12 bg-white shadow rounded-3 p-4 position-relative">
              <div style="background-color: var(--primary); top: -1rem; right: 1rem;"
                class="w-8 h-8 rounded-circle d-flex justify-content-center align-items-center position-absolute">
                <div id="name-char" class="text-white text-uppercase fw-bold fs-5"></div>
              </div>

              <h4 id="user-name" class="Montserrat fw-bold"></h4>
              <h6 id="user-email" style="color: var(--primary);" class="fw-bold fs-7 Montserrat">
              </h6>
              <p class="fs-7 text-secondary mt-2 Montserrat">Last test Attempted on <span id="test-data"
                  class="fw-bold text-primary">
                </span></p>
            </div>

            <div class="col-sm col-12 bg-white shadow rounded-3 p-4 position-relative">
              <div style="background-color: var(--primary); top: -1rem; right: 1rem;"
                class="w-8 h-8 rounded-circle d-flex justify-content-center align-items-center position-absolute">
                <i class="fa-sharp fa-solid fa-star text-white"></i>
              </div>

              <h4 class="Montserrat fw-bold">Marks Scored!</h4>
              <h4 style="color: var(--primary);" class="fs-4 fw-semibold"> <span id="mark-scored">88</span>/100</h4>

              <p class="fs-7 text-secondary mt-2 Montserrat">Highest Score is <span
                  class="fw-bold text-primary">94/100</span>
              </p>
            </div>

            <div class="col-sm col-12 bg-white shadow rounded-3 p-4 position-relative">
              <div style="background-color: var(--primary); top: -1rem; right: 1rem;"
                class="w-8 h-8 rounded-circle d-flex justify-content-center align-items-center position-absolute">
                <i class="fa-solid fa-clock text-white"></i>
              </div>
              <h4 class="Montserrat fw-bold">Time Spent:</h4>
              <h4 style="color: var(--primary);" class="fs-4 fw-semibold"> <span id="time-taken"></span>/180 minutes
              </h4>

              <p class="fs-7 text-secondary mt-2 Montserrat">Fastest Time Span is <span
                  class="fw-bold text-primary">80/180
                  minute.</span>
              </p>
            </div>
          </div>

          <!--Percentile Calulator-->
          <div class="d-flex justify-content-start align-items-center gap-2 my-5 Montserrat text-dark fw-bold">
            <span>Your Currect Percentile is </span>
            <div style="width: 20rem; height: 2rem; background-color: var(--slight-primary);" class="shadow rounded-3">
              <div id="percentile" style="background-color: var(--primary); width: 88%;"
                class="div h-100 rounded-3 text-white p-0 d-flex justify-content-center align-items-center">
              </div>
            </div>
          </div>

          <!--Charts-->
          <div class="mt-5">
            <canvas id="myChart"></canvas>
          </div>
        </section>
      </div>
    </div>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



  <script src="./script.js"></script>
</body>

</html>