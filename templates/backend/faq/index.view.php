<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQs - Admin Dashboard</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php'; ?>

  <main>
    <header>
      <h1 style="margin-bottom:50px;">List of FAQs</h1>
      <a href="/faqs/create" class="btn add">Add New FAQ</a>
    </header>

    <!-- ✅ Flash messages -->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="alert alert-success"><?= $_SESSION['success'];
                                        unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?= $_SESSION['error'];
                                      unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <!-- ✅ FAQ Table -->
    <?php if (!empty($faqs)): ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($faqs as $faq): ?>
            <tr>
              <td><?= htmlspecialchars($faq['title']); ?></td>
              <td><?= htmlspecialchars(substr($faq['description'], 0, 50)); ?>...</td>
              <td>

                <a href="/faqs/edit/<?= htmlspecialchars($faq['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                <form method="POST" action="/faqs/delete/<?= htmlspecialchars($faq['id']); ?>" style="display:inline-block;">
                  <button type="submit" class="btn delete">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>No FAQs found.</p>
    <?php endif; ?>
  </main>
</body>

</html>