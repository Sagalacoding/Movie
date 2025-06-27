<?php
require_once '../movie.php';
$movie = new Movie();
$id = $_GET['id'];
$datas = $movie->getMovieById($id);
foreach($datas as $data){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= "$data[title]"?> - Detail</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <div class="nav-container">
        <div class="nav-left">
          <a href="../index.php"><span class="logo-text">LABTIF Movie</span></a>
        </div>
        <button class="nav-toggle" aria-label="Toggle navigation">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>
        <nav class="nav-menu">
          <a href="../index.php">Home</a>
          <a href="index.php">Movies</a>
          <a href="#" class="btn-login">Login</a>
          <a href="#" class="btn-register">Register</a>
        </nav>
      </div>
    </header>

    <!-- Movie Detail Section -->
    <div class="movie-detail-hero">
      <div class="movie-detail-container">
        <a href="../index.php" class="back-button">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m15 18-6-6 6-6"/>
          </svg>
          Kembali Ke Home
        </a>

        
        <div class="movie-content">
          <div class="movie-poster">
            <img id="moviePoster" src="../images/<?="$data[cover]" ?>" alt="Movie Poster" />
          </div>
          
          <div class="movie-info">
            <h1 id="movieTitle" class="movie-title"><?="$data[title]" ?></h1>
            
            <div class="movie-metadata">
              <span id="movieGenre" class="genre-tag"><?="$data[genre]" ?></span>
            </div>
            
            <div class="movie-description">
              <h2>Deskripsi</h2>
              <p id="movieDescription">
              <?="$data[description]" ?>
              </p>
            </div>
            
            <div class="movie-actions">
              <button class="btn-watch">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8 5v14l11-7z"/>
                </svg>
                Watch Movie
              </button>
              
              <button class="btn-trailer">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="5,3 19,12 5,21"/>
                </svg>
                Watch Trailer
              </button>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <?php
    }
    ?>

    <!-- Footer -->
    <footer class="custom-footer">
      <div class="footer-container">
        <div class="brand-container">
          <a class="brand-link" href="#" aria-label="Brand">LABTIF Movie</a>
        </div>

        <ul class="nav-links">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="crud/index.php">Movies</a>
          </li>
        </ul>

        <div class="social-icons">
          <a class="social-icon" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
            </svg>
          </a>
          <a class="social-icon" href="https://www.instagram.com/labtif.unsur/">
            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
            </svg>
          </a>
          <a class="social-icon" href="https://github.com/unsur-labtif">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
            </svg>
          </a>
        </div>
      </div>
    </footer>

    <script>
      const toggle = document.querySelector(".nav-toggle");
      const menu = document.querySelector(".nav-menu");
      toggle.addEventListener("click", () => {
        menu.classList.toggle("active");
      });

    </script>
  </body>
</html>