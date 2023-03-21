<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="./explore.css" />
  <link rel="stylesheet" href="./style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&family=Yellowtail&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a7688800d8.js" crossorigin="anonymous"></script>
  <link rel="icon" href="images/icon.png" type="image/gif">
  <title>LernX academics</title>
</head>

<body>

  <div class="wrap">
    <div class="nav" id="nav">
      <button id="close" class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">
        <i class="fa-solid fa-xmark"></i>
      </button>
      <div class="upper ">
        <img class="mx-auto d-block" src="images/blackLogo.png" width="140" alt="" />
      </div>
      <div class="menu">
        <a href="index.php" class="active hvr-grow">
          <i class="fa fa-user"></i>
          <h2>Home</h2>
        </a>
        <a href="Explore.php" class=" hvr-grow">
          <i class="fa-solid fa-compass"></i>
          <h2>Explore</h2>
        </a>
        <a href="note.php" class=" hvr-grow">
          <i class="fa-solid fa-compass"></i>
          <h2>Notes</h2>
        </a>
        <a href="assessment.php" class=" hvr-grow">
          <i class="fa-solid fa-compass"></i>
          <h2>Assessment</h2>
        </a>

      </div>
      <img id="plant" src="./images/plant.png" alt="" />
      <div class="social">
        <a class="hvr-grow" href="https://www.instagram.com/lernx.in/"><i class="fa fa-instagram "></i></a>
        <a class="hvr-grow" href="https://www.google.com/search?q=lernx"><i class="fa fa-google"></i></a>
        <a class="hvr-grow" href="https://www.linkedin.com/company/77900983/"><i class="fa-brands fa-linkedin"></i></a>
      </div>
    </div>

    <div class="main">
      <div class="head-icons d-flex justify-content-end align-items-center gap-4">
        <a href="#" class="text-secondary"><i class="fa fa-user"></i></a>
        <i id="menu-icon" class="fa fa-solid fa-bars text-secondary"></i>
      </div>

      <main>
        <section class="bg-secondary Montserrat py-5 px-md-5 px-sm-3 px-0 mx-auto container-fluid">
          <a class="d-flex justify-content-start align-items-center w-auto gap-3 text-decoration-none p-3">
            <i class="text-blackish fa-solid fa-file-lines fs-4"></i>
            <p class="text-blackish fw-semibold fs-4 m-0">Assessment</p>
          </a>

          <div class="row pb-5">
            <div class="col-xl-6 col-12">
              <h1 class="text-primary Montserrat fw-bolder h1 p-0">Get hired faster with our personalized <span class="text-redish">assessments.</span>
              </h1>

              <p class="text-secondary my-4">By subscribing to our online platform, you get access to all notes and resources
                from
                top universities and colleges. Search according to your college and subject.</p>

              <div class="d-flex justify-content-start align-items-center">
                <div class="">
                  <h4 class="text-redish h3 fw-medium text-center">15K+</h4>
                  <p class="text-center fw-semibold  text-secondary">Total People Hired</p>
                </div>

                <div class="px-3">
                  <h4 class="h3 text-redish fw-medium text-center">55K+</h4>
                  <p class="text-center fw-semibold text-secondary">Open Jobs Position</p>
                </div>

                <div class="">
                  <h4 class="h3 text-redish fw-medium text-center">106K+</h4>
                  <p class="text-center fw-semibold text-secondary">Positive Reviews</p>
                </div>
              </div>


              <button class="bg-primary btn py-2 rounded text-white fs-5 fw-medium mt-4 px-3">Take your Test Today
                <i class="fa-regular fa-circle-right"></i></button>
            </div>

            <div class="col-xl-6 col-12">
              <div class="d-flex justify-content-center align-items-center">
                <img src="./images/assessment.png" class="w-lg-100 w-75 mx-auto" alt="">
              </div>
            </div>
          </div>
        </section>


        <section class="py-5 px-md-5 px-sm-3 px-0 mx-auto container-fluid">
          <h3 class="text-blackish Montserrat fw-semibold mb-4">Subject Wise Exam</h3>
          <div id="btn-container" class="d-flex justify-content-start align-items-start gap-3 flex-wrap">
          </div>
        </section>


        <div class="footer ">
          <div class="aa">
            <img src="https://lernx.io/images/ffff.png" alt="" width=120>
            <p> COPYRIGHTS © 2023 a Lernx Product. ALL RIGHTS RESERVED </p>
          </div>

          <div class="bb">
            <li><a href="https://lernx.io/Contact.php">Support</a></li>
            <li><a href="https://lernx.io/career">Careers</a></li>
            <li><a href="https://lernx.io/Explore.php">Courses</a></li>
          </div>
          <div class="cc">
            <li><a href="https://lernx.io/Terms.php">Terms and Conditions</a></li>
            <li><a href="https://lernx.io/Privacy-Policy.php">Privacy Policy</a></li>
            <li><a href="https://lernx.io/Refund-Policy.php">Refunds/Cancellations Policy </a></li>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <script src="./script.js"></script>
</body>

</hmtl>