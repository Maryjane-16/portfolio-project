<!-- backend/service/create.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create New Service</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1>Create New Service</h1>

      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>

      <form action="/services/store" method="POST" class="mt-4">
        <div class="form-group mb-3">
          <label for="title">Service Title</label>
          <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
          <label for="description">Service Description</label>
          <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Service</button>
        <a href="/services" class="btn btn-secondary">← Back to List</a>
      </form>
    </header>
  </main>

</body>

</html>