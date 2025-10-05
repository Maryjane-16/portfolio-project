<!-- backend/company/create.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Add Company</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>
  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1>Add Company Logo</h1>
    </header>

    <div id="create" class="card">
      <form method="POST" action="/companies/store" enctype="multipart/form-data">
        <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="form-group">
          <label for="logo">Company Logo:</label>
          <input type="file" id="logo" name="logo" accept="image/*" required />
        </div>

        <button type="submit" class="form-submit">Submit</button>
      </form>

      <br>
      <a href="/companies" class="btn back-button">← Back to List</a>
    </div>
  </main>
</body>

</html>