<?php
include './assets/php/db.php'
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="templatemo" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <title>Liberty NFT Marketplace - HTML CSS Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
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
<?php foreach ($moviesData as $movie) { ?>
    <div class="col-lg-6 currently-market-item all">
        <div class="item">
            <div class="left-image">
                <img src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>" alt="<?php echo $movie['title'] ?? 'No Title'; ?>" style="border-radius: 20px; min-width: 195px" />
            </div>
            <div class="right-content">
                <h4><?php echo $movie['title'] ?? 'No Title'; ?></h4>
                <p><strong>Genre:</strong> <?php echo $movie['genres'] ?? 'No Genre'; ?></p>
                <p><strong>Release Year:</strong> <?php echo $movie['release_year'] ?? 'No Year'; ?></p>
                <p><strong>Director:</strong> <?php echo $movie['director'] ?? 'No Director'; ?></p>
                <p><strong>Rating:</strong> <?php echo $movie['rating'] ?? 'No Rating'; ?></p>
                <p><strong>Studio:</strong> <?php echo $movie['studio'] ?? 'No Studio '; ?></p>
                <p><strong>session_date:</strong> <?php echo $movie['session_date'] ?? 'No date '; ?>,</p><p><?php echo $movie['session_time'] ?? 'No time '; ?></p>
                <p><strong>Ticket:</strong> <?php echo $movie['random_ticket'] ?? 'No ticket '; ?>$</p>
                <p><strong>Places:</strong> <?php echo $movie['random_place'] ?? 'No place '; ?></p>
                <p><strong>Discount:</strong> <?php echo $movie['discount'] ?? 'No discount '; ?>%</p>
                <p><strong>Overview:</strong> <?php echo $movie['overview'] ?? 'No Overview'; ?></p>
                <button class="openModalBtn" id="openModalBtn" data-movie='<?php echo json_encode($movie); ?>'>More</button>

            </div>
        </div>
    </div>
<?php } ?>
<div class="modal" id="myModal">
    <div class="modalContent">
        <span class="close">&times;</span>
        <div id="modalOverview">
          <div class="left-image" id="modalInfo">
          </div>
        </div>
    </div>
</div>

<script>
// Находим все кнопки "More"
let openModalBtns = document.querySelectorAll('.openModalBtn');

// Находим модальное окно и кнопку закрытия
let modal = document.getElementById('myModal');
let closeModal = document.querySelector('.close');

// Функция для отображения информации о фильме в модальном окне
function displayInfo(movie) {
    let modalInfo = document.getElementById('modalInfo');
    modalInfo.innerHTML = `
        <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title ?? 'No Title'}" style="border-radius: 20px; max-width: 195px" />
        <p><strong>Title:</strong> ${movie.title}</p>
        <p><strong>Genre:</strong> ${movie.genres}</p>
        <p><strong>Release Year:</strong> ${movie.release_year}</p>
        <p><strong>Director:</strong> ${movie.director}</p>
        <p><strong>Rating:</strong> ${movie.rating}</p>
        <p><strong>Studio:</strong> ${movie.studio}</p>
        <p><strong>Overview:</strong> ${movie.overview}</p>
    `;
}

// Функция для открытия модального окна с информацией о фильме
function openModal(event) {
    let movie = JSON.parse(event.target.dataset.movie);
    displayInfo(movie);
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden'; // Блокировка скролла
}

// Добавляем обработчик события на каждую кнопку "More"
openModalBtns.forEach(function(btn) {
    btn.addEventListener('click', openModal);
});

// Закрытие модального окна при нажатии на кнопку закрытия
closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
});

// Закрытие модального окна при клике за его пределами
window.addEventListener('click', function(event) {
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
              <a
                title="HTML CSS Templates"
                rel="sponsored"
                href="https://templatemo.com"
                target="_blank"
                >TemplateMo</a
              >
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
    <script src="assets/js/modalWin.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>
    
  </body>
</html>
