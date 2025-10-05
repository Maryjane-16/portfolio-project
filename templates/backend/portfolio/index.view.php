<!-- backend/portfolio/index.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Portfolios</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1 class="spaced-bottom">List of Portfolios</h1>
      <br><br>

      <a href="/portfolios/create" class="btn edit">Create New Portfolio</a>

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
            <th>Title</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>

        <?php if (!empty($portfolios)): ?>
          <tbody>
            <?php foreach ($portfolios as $portfolio): ?>
              <tr>
                <td><?= htmlspecialchars($portfolio['title']) ?></td>
                <td><?= htmlspecialchars($portfolio['category']) ?></td>
                <td>
                  <!-- Show -->
                  <a href="/portfolios/<?= htmlspecialchars($portfolio['id']) ?>/show" class="btn show">Show</a>

                  <!-- Edit -->
                  <a href="/portfolios/<?= htmlspecialchars($portfolio['id']) ?>/edit" class="btn edit">Edit</a>

                  <!-- Delete -->
                  <form method="POST" action="/portfolios/<?= htmlspecialchars($portfolio['id']) ?>/delete" style="display:inline;">
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