<!-- backend/service/edit.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Service</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1 class="spaced-bottom">Edit Service</h1>
      <br><br>

      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
      <?php endif; ?>

      <form method="POST" action="/services/<?= htmlspecialchars($service['id']) ?>/update">
        <div class="form-group">
          <label for="title">Service Title</label>
          <input type="text" id="title" name="title" value="<?= htmlspecialchars($service['title']) ?>" required>
        </div>

        <div class="form-group">
          <label for="description">Service Description</label>
          <textarea id="description" name="description" rows="5" required><?= htmlspecialchars($service['description']) ?></textarea>
        </div>

        <br>
        <button type="submit" class="btn edit">Update Service</button>
      </form>
    </header>
  </main>

</body>

</html>