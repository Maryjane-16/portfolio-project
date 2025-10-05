<!-- backend/company/index.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Companies</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>
  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1 class="spaced-bottom">List of Companies</h1>
      <br><br>

      <a href="/companies/create" class="btn edit">Add New Company Logo</a>
      <br><br>

      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
      <?php endif; ?>

      <table>
        <thead>
          <tr>
            <th>Logo</th>
            <th>Actions</th>
          </tr>
        </thead>
        <?php if (!empty($companies)): ?>
          <tbody>
            <?php foreach ($companies as $company): ?>
              <tr>
                <td>
                  <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($company['logo']); ?>"
                    alt="Company Logo"
                    style="height:50px;">
                </td>
                <td>
                  <a href="/companies/<?= htmlspecialchars($company['id']) ?>/show" class="btn show">Show</a>
                  <a href="/companies/<?= htmlspecialchars($company['id']) ?>/edit" class="btn edit">Edit</a>

                  <form method="POST" action="/companies/<?= htmlspecialchars($company['id']) ?>/delete" style="display:inline;">
                    <button type="submit" class="btn delete">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        <?php endif; ?>
      </table>
    </header>
  </main>
</body>

</html>