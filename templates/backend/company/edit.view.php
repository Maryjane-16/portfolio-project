<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Company Logo</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1>Edit Company Logo</h1>
    </header>

    <section class="form-section">
      <!-- Show messages -->
      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'];
                                        unset($_SESSION['error']); ?></div>
      <?php endif; ?>

      <form action="/companies/<?= htmlspecialchars($company['id']); ?>/update" method="POST" enctype="multipart/form-data" class="form-card">

        <div class="form-group">
          <label for="logo">Upload New Logo (optional)</label>
          <input type="file" name="logo" id="logo" class="form-control">
        </div>

        <div class="form-group">
          <label>Current Logo</label>
          <div class="preview-box">
            <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($company['logo']); ?>"
              alt="Company Logo" class="img-preview">
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn edit">Update Logo</button>
          <a href="/companies" class="btn back-button">← Back to List</a>
        </div>
      </form>
    </section>
  </main>

</body>

</html>