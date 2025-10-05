<!-- backend/service/index.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Services</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1 class="spaced-bottom">List of Services</h1>
      <br><br>

      <a href="/services/create" class="btn edit">Create New Service</a>

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
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>

        <?php if (!empty($services)): ?>
          <tbody>
            <?php foreach ($services as $service): ?>
              <tr>
                <td><?= htmlspecialchars($service['title']) ?></td>
                <td><?= htmlspecialchars($service['description']) ?></td>
                <td>
                  <!-- Edit -->
                  <a href="/services/<?= htmlspecialchars($service['id']) ?>/edit" class="btn edit">Edit</a>
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