<!-- backend/company/show.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Company Details</title>
  <link rel="stylesheet" href="/assets/backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>
  <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

  <main>
    <header>
      <h1>Company Logo Detail</h1>
    </header>

    <section class="company-details">
      <div class="details-card">
        <div class="details-image">
          <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($company["logo"]); ?>"
            alt="Company Logo">
        </div>
        <a href="/companies" class="btn back-button">← Back to List</a>
      </div>
    </section>
  </main>
</body>

</html>