<!-- create.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Portfolio</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1>Create Portfolio</h1>
    </header>

    <div id="create" class="card">
      <h2>Add Portfolio</h2>
      <form method="POST" action="/portfolios/store" enctype="multipart/form-data">

        <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger"><?= $_SESSION['error'] ?> </div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success"><?= $_SESSION['success'] ?> </div>
          <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title" required />
        </div>

        <div class="form-group">
          <label for="category">Category:</label>
          <input type="text" id="category" name="category" required />
        </div>

        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" id="image" name="image" accept="image/*" />
        </div>

        <button type="submit" class="form-submit">Submit</button>
      </form>

      <br>

      <a href="/portfolios" class="btn back-button">← Back to List</a>
    </div>
  </main>
</body>

</html>