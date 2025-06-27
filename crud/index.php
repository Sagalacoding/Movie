<?php
require_once 'auth/session.php';
$session = new Session();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Movie Section</title>
    <style>
      body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
          Helvetica, Arial, sans-serif;
        line-height: 1.5;
        color: #e5e7eb;
        background-color: #111;
      }

      .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
      }

      .movie-container {
        max-width: 85rem;
        margin: 0 auto;
        padding: 1rem 1.5rem;
      }

      .back-link {
        display: inline-block;
        margin-bottom: 1rem;
        color: #3b82f6;
        text-decoration: none;
        font-weight: 500;
      }

      .back-link:hover {
        text-decoration: underline;
      }

      .movie-card {
        display: flex;
        flex-direction: column;
      }

      .movie-card-inner {
        overflow-x: auto;
      }

      .movie-content {
        background-color: #1e1e1e;
        border: 1px solid #333;
        border-radius: 0.75rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
        overflow: hidden;
      }

      .movie-header {
        display: grid;
        gap: 0.75rem;
        padding: 1.5rem;
        border-bottom: 1px solid #333;
      }

      @media (min-width: 768px) {
        .movie-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
      }

      .movie-header h2 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #f9fafb;
        margin: 0;
      }

      .movie-header p {
        font-size: 0.875rem;
        color: #9ca3af;
        margin: 0;
      }

      .header-buttons {
        display: inline-flex;
        gap: 0.5rem;
      }

      .add-movie-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: white;
        background-color: #2563eb;
        border: 1px solid transparent;
        border-radius: 0.375rem;
        text-decoration: none;
      }

      .add-movie-btn:hover {
        background-color: #1d4ed8;
      }

      .plus-icon {
        width: 1rem;
        height: 1rem;
      }

      .movie-table {
        width: 100%;
        border-collapse: collapse;
      }

      .movie-table thead {
        background-color: #1a1a1a;
      }

      .movie-table th {
        padding: 0.75rem 1.5rem;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 600;
        color: #d1d5db;
        text-transform: uppercase;
      }

      .movie-table td {
        padding: 0.75rem 1.5rem;
        white-space: nowrap;
      }

      .movie-table tbody tr {
        border-bottom: 1px solid #333;
      }

      .movie-table tbody tr:last-child {
        border-bottom: none;
      }

      .poster-cell img {
        width: 75px;
        height: 100px;
        border-radius: 4px;
        object-fit: cover;
      }
      .title-cell {
        width: 150px; 
      }

      .genre-cell {
        width: 120px; 
      }

      .description-cell {
        width: auto; 
        white-space: normal;
        word-wrap: break-word;
      }

      .action-cell {
        width: 120px;
      }

      .movie-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
      }

      .movie-title {
        font-size: 0.875rem;
        font-weight: 600;
        color: #f9fafb;
      }

      .movie-genre {
        font-size: 0.875rem;
        font-weight: 600;
        color: #f9fafb;
      }

      .movie-description {
        font-size: 0.875rem;
        color: #9ca3af;
        white-space: normal;
        word-break: break-word;
      }
      

      .edit-link {
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.875rem;
        color: #3b82f6;
        text-decoration: none;
        font-weight: 500;
      }

      .edit-link:hover {
        text-decoration: underline;
      }

      .delete-link {
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.875rem;
        color: #f52626;
        text-decoration: none;
        font-weight: 500;
        margin-left: 1rem;
      }

      .delete-link:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="movie-container">
      <a href="../index.php" class="back-link">← Back to Home</a>

      <div class="movie-card">
        <div class="movie-card-inner">
          <div class="movie-content">
            <div class="movie-header">
              <div>
                <h2>Movie Details</h2>
                <p>View and manage movie details</p>
              </div>

              <div>
                <div class="header-buttons">
                  <a class="add-movie-btn" href="create.php">
                    <svg
                      class="plus-icon"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path d="M5 12h14" />
                      <path d="M12 5v14" />
                    </svg>
                    Add Movie
                  </a>
                </div>
              </div>
            </div>
            <table class="movie-table">
              <thead>
                <tr>
                  <th class="poster-cell">
                    <div>
                      <span>Cover</span>
                    </div>
                  </th>

                  <th class="title-cell">
                    <div>
                      <span>Title</span>
                    </div>
                  </th>

                  <th class="genre-cell">
                    <div>
                      <span>Genre</span>
                    </div>
                  </th>

                  <th class="description-cell">
                    <div>
                      <span>Description</span>
                    </div>
                  </th>

                  <th class="action-cell"></th>
                </tr>
              </thead>

              <tbody>
                <?php
                  require_once '../movie.php';
                  $movie = new Movie();
                  $datas = $movie->getAllMovies();
                  foreach ($datas as $data) {
                    ?>
                    <tr>
                      <td class="poster-cell">
                        <img
                          src="../images/<?= "$data[cover]" ?>"
                        />
                      </td>
                      <td class="title-cell">
                        <div class="movie-info">
                          <span class="movie-title"><?= "$data[title]"?></span>
                        </div>
                      </td>
                      <td class="genre-cell">
                        <div>
                          <span class="movie-genre"><?= "$data[genre]"?></span>
                        </div>
                      </td>
                      <td class="description-cell">
                        <div>
                          <span class="movie-description"
                            ><?= "$data[description]"?></span
                          >
                        </div>
                      </td>
                      <td class="action-cell">
                        <div>
                          <a class="edit-link" href="<?="update.php?id=$data[id]"?>"> Edit </a>
                          <a class="delete-link" onclick="return confirm('apakah anda yakin?')" href="<?="delete.php?id=$data[id]"?>"> Delete </a>
                        </div>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
