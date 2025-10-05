<!-- backend/portfolio/show.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio Details</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1>Portfolio Detail</h1>

      <section class="portfolio-details">
        <h2 class="details-heading">Portfolio Information</h2>

        <div class="details-card">
          <div class="details-image">
            <?php if (!empty($portfolio["image"])): ?>
              <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($portfolio["image"]); ?>" alt="Portfolio Image" />
            <?php else: ?>
              <p><em>No image uploaded</em></p>
            <?php endif; ?>
          </div>

          <div class="details-content">
            <p><strong>Title:</strong> <?= htmlspecialchars($portfolio['title']); ?></p>
            <p><strong>Category:</strong> <?= htmlspecialchars($portfolio['category']); ?></p>

            <a href="/portfolios" class="btn back-button">← Back to List</a>
          </div>
        </div>
      </section>
    </header>
  </main>

</body>

</html>