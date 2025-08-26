<!-- dashboard.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
</head>
<body>

    <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <div class="main">
      <h1>Contact Messages</h1>

       <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error'] ?> </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= $_SESSION['success'] ?> </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

       <?php if (!empty($contacts)): ?>
        <div class="contact-grid">
            <?php foreach ($contacts as $index => $contact): ?>

      <section class="contact-details">
        <h2 class="details-heading" style="margin-top: 30px;"><?= htmlspecialchars($contact['name']); ?></h2>
        <div class="details-content">
      <p><strong>Name:</strong> <?= htmlspecialchars($contact['name']); ?></p>
      <p><strong>Phone:</strong> <?= htmlspecialchars($contact['phone']); ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($contact['email']); ?></p>
      <p><strong>Message:</strong> <?= htmlspecialchars($contact['message']); ?></p>
         </div>
         <form method="POST" action="/contacts/delete/<?= htmlspecialchars($contact['id']) ?>">
            <button type="submit" class="btn delete">Delete</button>
            </form>
            </section>
          <?php endforeach; ?>
          </div>
           <?php endif; ?>
    

    </div>
    </main>
   </body>
</html>
