<?php
include './assets/php/db.php';
include './assets/php/db_API.php';
include './assets/php/action.php';
include './assets/php/search.php';


if (isset($_GET['sort_by'])) {
  if ($_GET['sort_by'] === 'directors') {
    include_once "./assets/php/action.php";
    usort($moviesData, 'SortGenres');
  }
  if ($_GET['sort_by'] === 'genre') {
    include_once "./assets/php/action.php";
    usort($moviesData, 'SortGenres');
  }
  if ($_GET['sort_by'] === 'rating') {
    include_once "./assets/php/action.php";
    usort($moviesData, 'SortRating');
  }
  if ($_GET['sort_by'] === 'session_time') {
    include_once "./assets/php/action.php";
    usort($moviesData, 'sortSessionTime');
  }
  if ($_GET['sort_by'] === 'random_ticket') {
    include_once "./assets/php/action.php";
    usort($moviesData, 'sortPriceTicket');
  }
  if ($_GET['sort_by'] === 'studio') {
    include_once "./assets/php/action.php";
    usort($moviesData, 'SortStudio');
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />

  <title>Radiant Rise</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
              <li><a href="#main-banner" class="active">Info</a></li>
              <li><a href="#currently-market">Screenings</a></li>
              <li><a href="" id="form-open">Login</a></li>
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
  <div class="login">
    <div class="form_container">
      <i class="bx bx-x form_close"></i>
      <div class="form login_form">
        <form method="POST" action="">
          <h2>Login</h2>

          <div class="input_box">
            <input type="text" id="username" name="username" placeholder="Enter Your Name" required />
            <i class="bx bx-envelope name"></i>
          </div>
          <div class="input_box">
            <input type="password" id="password" name="password" placeholder="Enter Your Password" required />
            <i class="bx bx-lock-alt password"></i>
            <i class="uil uil-eye-slash pw_hide"></i>
          </div>
          <div class="option_field">
            <span class="checkbox">
              <input type="checkbox" id="checkLogin" />
              <label for="check">Remember me</label>
            </span>
            <a href="#" class="forgot_pw">Forgot password?</a>
          </div>
          <button class="login-now">Login now</button>
        </form>
      </div>

    </div>
  </div>

  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <div id="main-banner" class="main-banner">
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

            <div id="loginMessage">
              <h4 class="loginMes">
                <?php
                include './assets/php/login_check.php';
                ?>
              </h4>
            </div>
            <div class="buttons">
              <div class="main-button">
                <a href="#currently-market">Proceed to Watch</a>
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

  <div id="currently-market" class="currently-market">
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
            <ul id="filterList">
              <li data-filter="*" class="filterBtn active" data-value="popular" id="popularBtn">Popular Films</li>
              <li data-filter="directors" class="filterBtn" id="directorsBtn" data-value="directors">Directors</li>
              <li data-filter="genre" class="filterBtn" data-value="genre" id="genreBtn">Genre Selection</li>
              <li data-filter="rating" class="filterBtn" data-value="rating" id="ratingBtn">Rating</li>
              <li data-filter="studio" class="filterBtn" data-value="studio" id="studioBtn">Studio</li>
              <li data-filter="session" class="filterBtn" data-value="session" id="sessionBtn">Session Start</li>
              <li data-filter="ticket" class="filterBtn" data-value="ticket" id="ticketBtn">Ticket Price</li>
            </ul>
          </div>
        </div>


        <div id="search-container" class="search-container">
          <form id="searchForm">
            <input type="text" id="searchInput" placeholder="Search..." class="search-input">
            <button type="button" class="search-button" id="searchBtn">Search</button>
          </form>
        </div>

        <script>
          document.getElementById('searchBtn').addEventListener('click', function () {
            var searchQuery = document.getElementById('searchInput').value;
            var url = new URL(window.location.href);
            url.searchParams.set('search', searchQuery);
            window.location.href = url.toString();
          });
        </script>



        <!-- ***** Filters End ***** -->
        <?php foreach ($moviesData as $movie) { ?>
          <div class="col-lg-6 currently-market-item all movies-container">
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

                  for ($i = 0; $i < $fullStars; $i++) {
                    echo '<i class="bx bxs-star"></i>';
                  }

                  if ($halfStar > 0) {
                    echo '<i class="bx bxs-star-half"></i>';
                  }

                  for ($i = 0; $i < $emptyStars; $i++) {
                    echo '<i class="bx bx-star"></i>';
                  }
                  ?>
                </div>
                </p>
                <p><strong class="strng">Session:</strong>
                  <?php echo ($movie['session_date'] ?? 'No date') . ', ' . ($movie['session_time'] ?? 'No time'); ?>
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
                  'rand_profit' => $movie['rand_profit'],
                ];

                $encodedData = json_encode($movieData);

                if ($encodedData === false) {
                  echo 'Data serialization error';
                } else {
                  echo '<button class="openModalBtn" data-movie=\'' . htmlspecialchars($encodedData, ENT_QUOTES, 'UTF-8') . '\'>More</button>';
                }
                ?>
              </div>
            </div>
          </div>
        <?php } ?>



        <script>
          document.getElementById('directorsBtn').addEventListener('click', function () {
            var url = new URL(window.location.href);
            if (url.searchParams.has('sort_by')) {
              url.searchParams.delete('sort_by');
            }
            window.location.href = '?sort_by=directors';
          });

          document.getElementById('popularBtn').addEventListener('click', function () {
            var url = new URL(window.location.href);
            if (url.searchParams.has('sort_by')) {
              url.searchParams.delete('sort_by');
            }
            window.location.href = url.toString();
          });

          document.getElementById('genreBtn').addEventListener('click', function () {
            var url = new URL(window.location.href);
            if (url.searchParams.has('sort_by')) {
              url.searchParams.delete('sort_by');
            }
            window.location.href = '?sort_by=genre';
          });

          document.getElementById('ratingBtn').addEventListener('click', function () {
            var url = new URL(window.location.href);
            if (url.searchParams.has('sort_by')) {
              url.searchParams.delete('sort_by');
            }
            window.location.href = '?sort_by=rating';
          });

          document.getElementById('sessionBtn').addEventListener('click', function () {
            var url = new URL(window.location.href);
            if (url.searchParams.has('sort_by')) {
              url.searchParams.delete('sort_by');
            }
            window.location.href = '?sort_by=session_time';
          });

          document.getElementById('ticketBtn').addEventListener('click', function () {
            var url = new URL(window.location.href);
            if (url.searchParams.has('sort_by')) {
              url.searchParams.delete('sort_by');
            }
            window.location.href = '?sort_by=random_ticket';
          });
          document.getElementById('studioBtn').addEventListener('click', function () {
            var url = new URL(window.location.href);
            if (url.searchParams.has('sort_by')) {
              url.searchParams.delete('sort_by');
            }
            window.location.href = '?sort_by=studio';
          });
        </script>


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
          let userRole = "<?php echo isset($userRole) ? $userRole : ''; ?>";

          function displayInfo(movie) {
            let modalInfo = document.getElementById('modalInfo');

            if (userRole === 'admin') {
              modalInfo.innerHTML = `
            <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title ?? 'No Title'}" style="border-radius: 20px; max-width: 195px" />
            <p><strong>Title:</strong> ${movie.title}</p>
            <p><strong>Genre:</strong> ${movie.genres}</p>
            <p><strong>Director:</strong> ${movie.director}</p>
            <p><strong>Release Year:</strong> ${movie.release_year}</p>
            <p><strong>Rating:</strong> ${movie.rating}</p>
            <p><strong>Studio:</strong> ${movie.studio}</p>
            <p><strong>Date:</strong> ${movie.session_date},${movie.session_time}</p>
            <p><strong>Ticket:</strong> ${movie.random_ticket}$</p>
            <p><strong>Place:</strong> ${movie.random_place}</p>
            <p><strong>Discount:</strong> ${movie.discount}</p>
            <p><strong>Profit:</strong> ${movie.rand_profit}$</p>
            <p><strong>Overview:</strong> ${movie.overview}</p>
        `;
            } else if (userRole === 'user') {
              modalInfo.innerHTML = `
            <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title ?? 'No Title'}" style="border-radius: 20px; max-width: 195px" />
            <p><strong>Title:</strong> ${movie.title}</p>
            <p><strong>Genre:</strong> ${movie.genres}</p>
            <p><strong>Director:</strong> ${movie.director}</p>
            <p><strong>Release Year:</strong> ${movie.release_year}</p>
            <p><strong>Rating:</strong> ${movie.rating}</p>
            <p><strong>Studio:</strong> ${movie.studio}</p>
            <p><strong>Date:</strong> ${movie.session_date},${movie.session_time}</p>
            <p><strong>Ticket:</strong> ${movie.random_ticket}$</p>
            <p><strong>Place:</strong> ${movie.random_place}</p>
            <p><strong>Discount:</strong> ${movie.discount}</p>
            <p><strong>Overview:</strong> ${movie.overview}</p>
        `;
            } else {
              modalInfo.innerHTML = `
            <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title ?? 'No Title'}" style="border-radius: 20px; max-width: 195px" />
            <p><strong>Title:</strong> ${movie.title}</p>
            <p><strong>Genre:</strong> ${movie.genres}</p>
            <p><strong>Director:</strong> ${movie.director}</p>
            <p><strong>Release Year:</strong> ${movie.release_year}</p>
            <p><strong>Rating:</strong> ${movie.rating}</p>
            <p><strong>Studio:</strong> ${movie.studio}</p>
            <p><strong>Date:</strong> ${movie.session_date},${movie.session_time}</p>
            <p><strong>Ticket:</strong> ${movie.random_ticket}$</p>
            <p><strong>Place:</strong> ${movie.random_place}</p>
            <p><strong>Discount:</strong> ${movie.discount}</p>
            <p><strong>Overview:</strong> ${movie.overview}</p>
        `;
            }
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

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>
            Copyright ©
            <?php echo date('Y'); ?><a> Radiant Rise</a>
            All rights reserved.&nbsp;&nbsp;Designed by
            <a title="HTML CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a> &
            Artem Shukhat
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/login.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>