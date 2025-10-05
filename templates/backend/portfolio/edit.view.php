<!-- edit.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1>Edit Portfolio</h1>

      <div id="create" class="card">
        <h2>Update Portfolio</h2>

        <form method="POST" action="/portfolios/update/<?= htmlspecialchars($portfolio['id']) ?>" enctype="multipart/form-data">

          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($portfolio['title']); ?>" required />
          </div>

          <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?= htmlspecialchars($portfolio['category']); ?>" required />
          </div>

          <div class="form-group">
            <label for="image">Current Image:</label>
            <input type="file" id="image" name="image" accept="image/*" />
            <?php if (!empty($portfolio["image"])): ?>
              <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($portfolio['image']); ?>" alt="Portfolio Image" />
            <?php endif; ?>
          </div>

          <button type="submit" class="form-submit">Update</button>
        </form>

        <br>
        <a href="/portfolios" class="btn back-button">← Back to List</a>
      </div>
    </header>
  </main>

</body>

</html>