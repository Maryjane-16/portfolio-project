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
      <h1 class="spaced-bottom">List of Testimonials</h1>
      <br> <br>

      <a href="/testimonials/create" class="btn edit">Create New Testimonial</a>

      <br> <br>
      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?> </div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?> </div>
        <?php unset($_SESSION['success']); ?>
      <?php endif; ?>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Actions</th>
          </tr>
        </thead>
        <?php if (!empty($testimonials)): ?>
          <tbody>
            <?php foreach ($testimonials as $index => $testimonial): ?>
              <tr>
                <td><?= htmlspecialchars($testimonial['name']) ?></td>
                <td><?= htmlspecialchars($testimonial['position']) ?></td>
                <td>
                  <a href="/testimonials/<?= htmlspecialchars($testimonial['id']) ?>/show" class="btn show">Show</a>
                  <a href="/testimonials/<?= htmlspecialchars($testimonial['id']) ?>/edit" class="btn edit">Edit</a>

                  <form method="POST" action="/testimonials/delete/<?= htmlspecialchars($testimonial['id']) ?>">
                    <button type="submit" class="btn delete">Delete</button>
                  </form>

                </td>
              </tr>
            <?php endforeach; ?>
            <!-- Add more rows as needed -->
          </tbody>
        <?php endif; ?>
      </table>
    </header>

</body>

</html>