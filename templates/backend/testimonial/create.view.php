<!-- dashboard.html -->
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
      <h1>Create Testimonial</h1>
    </header>

      
      <div id="create" class="card">
        <h2>Add Testimonial</h2>
        <form method="POST" action="/testimonials/store" enctype="multipart/form-data">

          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?> </div>
            <?php unset($_SESSION['error']); ?>
          <?php endif; ?>

          <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?> </div>
            <?php unset($_SESSION['success']); ?>
          <?php endif; ?>

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required />
          </div>

          <div class="form-group">
            <label for="Position">Position:</label>
            <input type="text" id="position" name="position" required />
          </div>

          <div class="form-group">
            <label for="review">Review:</label>
            <textarea id="review" name="review" rows="4" required></textarea>
          </div>

          <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" />
          </div>

          <button type="submit" class="form-submit">Submit</button>
        </form>

        <br>

        <a href="/testimonials" class="btn back-button">← Back to List</a>
      </div>
  </main>
</body>

</html>