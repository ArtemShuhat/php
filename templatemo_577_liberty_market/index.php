<?php
include './assets/php/db.php'
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="author" content="templatemo" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />

  <title>Liberty NFT Marketplace - HTML CSS Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="assets/images/logo.png" alt="" />
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.html" class="active">Search</a></li>
              <li><a href="explore.html">Screenings</a></li>
              <li><a href="details.html">Info</a></li>
              <li><a href="create.html">Login</a></li>
            </ul>
            <a class="menu-trigger">
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>Radiant Rise</h6>
            <h2>Enjoy watching quickly &amp; beautiful</h2>
            <p>
              Welcome to RadiantRise, where cinematic dreams come alive. Our
              state-of-the-art theaters offer unparalleled comfort. Experience
              blockbuster hits and timeless classics in an atmosphere that
              ignites your passion for movies.
            </p>
            <div class="buttons">
              <div class="main-button">
                <a href="" target="_blank">Proceed to Watch</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="owl-banner owl-carousel">
            <div class="item">
              <img src="assets/images/banner-01.jpg" alt="" />
            </div>
            <div class="item">
              <img src="assets/images/banner-02.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->

  <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Best cinema ever.</h2>
          </div>
        </div>
        <!-- ***** Filters Start ***** -->
        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li data-filter="*" class="active">Popular Films</li>
              <li data-filter="">Directors</li>
              <li data-filter="">Genre Selection</li>
              <li data-filter="">Rating</li>
              <li data-filter="">Studio</li>
              <li data-filter="">Session Start</li>
              <li data-filter="">Ticket Price</li>
            </ul>
          </div>
        </div>
        <!-- ***** Filters End ***** -->
        <?php foreach($moviesData as $movie) { ?>
          <div class="col-lg-6 currently-market-item all">
            <div class="item">
              <div class="left-image">
                <img src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>"
                  alt="<?php echo $movie['title'] ?? 'No Title'; ?>" style="border-radius: 20px; min-width: 195px" />
              </div>
              <div class="right-content">
                <h4>
                  <?php echo $movie['title'] ?? 'No Title'; ?>
                </h4>
                <p><strong class="strng">Genre:</strong>
                  <?php echo $movie['genres'] ?? 'No Genre'; ?>
                </p>
                <p><strong class="strng">Release Year:</strong>
                  <?php echo $movie['release_year'] ?? 'No Year'; ?>
                </p>
                <p><strong class="strng">Rating:</strong>
                  <?php echo $movie['rating'] ?? 'No Rating'; ?>
                <div class="stars">
                  <?php
                  $rating = isset($movie['rating']) ? floatval($movie['rating']) : 0;
                  $fullStars = floor($rating / 2);
                  $halfStar = $rating % 2 >= 1 ? 1 : 0;
                  $emptyStars = 5 - $fullStars - $halfStar;

                  for($i = 0; $i < $fullStars; $i++) {
                    echo '<i class="bx bxs-star"></i>';
                  }

                  if($halfStar > 0) {
                    echo '<i class="bx bxs-star-half"></i>';
                  }

                  for($i = 0; $i < $emptyStars; $i++) {
                    echo '<i class="bx bx-star"></i>';
                  }
                  ?>
                </div>
                </p>
                <p><strong class="strng">Session:</strong>
                  <?php echo ($movie['session_date'] ?? 'No date').', '.($movie['session_time'] ?? 'No time'); ?>
                </p>
                <p><strong class="strng">Discount:</strong>
                  <?php echo $movie['discount'] ?? 'No discount '; ?>
                </p>
                <?php
                $movieData = [
                  'title' => $movie['title'],
                  'poster_path' => $movie['poster_path'],
                  'genres' => $movie['genres'],
                  'release_year' => $movie['release_year'],
                  'director' => $movie['director'],
                  'rating' => $movie['rating'],
                  'studio' => $movie['studio'],
                  'overview' => $movie['overview'],
                  'random_place' => $movie['random_place'],
                  'random_ticket' => $movie['random_ticket'],
                  'session_time' => $movie['session_time'],
                  'session_date' => $movie['session_date'],
                  'discount' => $movie['discount'],
                ];

                $encodedData = json_encode($movieData);

                if($encodedData === false) {
                  echo 'Data serialization error';
                } else {
                  echo '<button class="openModalBtn" data-movie=\''.htmlspecialchars($encodedData, ENT_QUOTES, 'UTF-8').'\'>More</button>';
                }
                ?>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="modal" id="myModal">
          <div class="modalContent">
            <span class="close">&times;</span>
            <div id="modalInfo"></div>
          </div>
        </div>


        <script>
          let openModalBtns = document.querySelectorAll('.openModalBtn');
          let modal = document.getElementById('myModal');
          let closeModal = document.querySelector('.close');

          function displayInfo(movie) {
            let modalInfo = document.getElementById('modalInfo');
            modalInfo.innerHTML = `
            <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title ?? 'No Title'}" style="border-radius: 20px; max-width: 195px" />
            <p><strong>Title:</strong> ${movie.title}</p>
            <p><strong>Genre:</strong> ${movie.genres}</p>
            <p><strong>Director:</strong> ${movie.director}</p>
            <p><strong>Release Year:</strong> ${movie.release_year}</p>
            <p><strong>Rating:</strong> ${movie.rating}</p>
            <p><strong>Studio:</strong> ${movie.studio}</p>
            <p><strong>Date:</strong> ${movie.session_date},${movie.session_time}</p>
            <p><strong>Ticket:</strong> ${movie.random_ticket}</p>
            <p><strong>Place:</strong> ${movie.random_place}</p>
            <p><strong>Discount:</strong> ${movie.discount}</p>
            <p><strong>Overview:</strong> ${movie.overview}</p>
        `;
          }

          function openModal(event) {
            try {
              let movie = JSON.parse(event.target.dataset.movie);
              displayInfo(movie);
              modal.style.display = 'block';
              document.body.style.overflow = 'hidden';
            } catch (error) {
              console.error('Error parsing JSON:', error);
            }
          }

          openModalBtns.forEach(function (btn) {
            btn.addEventListener('click', openModal);
          });

          closeModal.addEventListener('click', function () {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
          });

          window.addEventListener('click', function (event) {
            if (event.target == modal) {
              modal.style.display = 'none';
              document.body.style.overflow = 'auto';
            }
          });
        </script>


      </div>
    </div>

  </div>
  </div>
  </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>
            Copyright © 2022 <a href="#">Liberty</a> NFT Marketplace Co., Ltd.
            All rights reserved. &nbsp;&nbsp; Designed by
            <a title="HTML CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>