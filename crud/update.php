<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Movie</title>
    <style>
      body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
          Helvetica, Arial, sans-serif;
        line-height: 1.5;
        color: #e5e7eb;
        background-color: #111;
        margin: 0;
        padding: 20px;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
      }

      .back-btn {
        display: inline-block;
        color: #3b82f6;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 20px;
        padding: 8px 0;
      }

      .back-btn:hover {
        text-decoration: underline;
      }

      .card {
        background-color: #1e1e1e;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        padding: 25px;
        box-sizing: border-box;
      }

      .form-title {
        font-size: 18px;
        font-weight: 600;
        color: #f9fafb;
        margin-bottom: 20px;
      }

      .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
        margin-bottom: 20px;
      }

      @media (min-width: 640px) {
        .form-grid {
          grid-template-columns: 1fr 3fr;
          gap: 24px;
        }
      }

      .form-label {
        font-size: 14px;
        font-weight: 500;
        color: #9ca3af;
        margin-top: 10px;
      }

      .form-input {
        width: 100%;
        padding: 10px 12px;
        font-size: 14px;
        border: 1px solid #333;
        border-radius: 6px;
        background-color: #252525;
        color: #f9fafb;
        box-sizing: border-box;
      }

      .form-input:focus {
        border-color: #3b82f6;
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
      }

      .form-textarea {
        width: 100%;
        padding: 10px 12px;
        font-size: 14px;
        border: 1px solid #333;
        border-radius: 6px;
        background-color: #252525;
        color: #f9fafb;
        min-height: 120px;
        resize: vertical;
        box-sizing: border-box;
      }

      .form-textarea:focus {
        border-color: #3b82f6;
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
      }

      .file-input {
        width: 100%;
        padding: 8px 0;
        font-size: 14px;
        color: #9ca3af;
        box-sizing: border-box;
      }

      .file-input::-webkit-file-upload-button {
        background-color: #333;
        color: #f9fafb;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        margin-right: 16px;
        cursor: pointer;
      }

      .submit-btn {
        width: 100%;
        padding: 12px 16px;
        background-color: #2563eb;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.2s;
      }

      .submit-btn:hover {
        background-color: #1d4ed8;
      }

      .input-group {
        margin-bottom: 16px;
        width: 100%;
      }
    </style>
  </head>
  <body>
    <?php
        require_once '../movie.php';
        $movie = new Movie();
        $id = $_GET['id'];
        $datas = $movie->getMovieById($id);
        foreach ($datas as $data) {
    ?>
    <div class="container">
      <a href="index.php" class="back-btn">← Back</a>

      <div class="card">
        <form method="post" enctype="multipart/form-data">
          <h2 class="form-title">Update Movie</h2>

          <div class="form-grid">
            <label for="Title" class="form-label">Title</label>
            <div class="input-group">
              <input id="Title" type="text" class="form-input" name="title" required value="<?=$data['title']?>" />
            </div>
          </div>

          <div class="form-grid">
            <label for="genre" class="form-label">Genre</label>
            <div class="input-group">
              <input id="genre" type="text" class="form-input" name="genre" required value="<?=$data['genre']?>"/>
            </div>
          </div>

          <div class="form-grid">
            <label for="cover" class="form-label">Cover</label>
            <div class="input-group">
              <input type="file" id="cover" class="file-input" accept="image/png, image/jpg, image/jpeg" name="cover" required />
            </div>
          </div>

          <div class="form-grid">
            <label for="description" class="form-label">Description</label>
            <div class="input-group">
              <textarea
                id="description"
                class="form-textarea"
                placeholder="Add a Description For the Movie."
                name="description"
                required
              ><?=$data['description']?></textarea>
            </div>
          </div>

          <button type="submit" name="submit" class="submit-btn">Submit Movie</button>
        </form>
        <?php
        }
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $genre = $_POST['genre'];
                $description = $_POST['description'];
                $cover = $_FILES['cover']['name'];

                $path = "../images/" . basename($cover);
                move_uploaded_file($_FILES['cover']['tmp_name'], $path );

                $data = [
                    'title' => $title,
                    'genre' => $genre,
                    'description' => $description,
                    'cover' => $cover
                ];
                $where = ['id' => $id];

                $movie->updateMovie($data, $where);
                echo "<script>alert('Data Berhasil Diupdate'); window.location.href='index.php';</script>";
            }
        ?>
      </div>
    </div>
  </body>
</html>
