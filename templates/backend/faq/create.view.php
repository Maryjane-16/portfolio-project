<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create FAQ</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php'; ?>

  <main>
    <header>
      <h1>Create New FAQ</h1>
    </header>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?= $_SESSION['error'];
                                      unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form method="POST" action="/faqs/store">
      <div class="form-group">
        <label for="title">FAQ Title</label>
        <input type="text" name="title" id="title" required>
      </div>

      <div class="form-group">
        <label for="description">FAQ Description</label>
        <textarea name="description" id="description" rows="5" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Save FAQ</button>
      <a href="/faqs" class="btn btn-secondary">Back</a>
    </form>
  </main>
</body>

</html>