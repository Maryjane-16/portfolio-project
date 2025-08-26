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
    <header>
      <h1>Testimonial Detail</h1>

      <section class="testimonial-details">
        <h2 class="details-heading">Testimonial Details</h2>
         <div class="details-card">
        <div class="details-image">
      <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($testimonial["photo"]); ?>" alt="" />
        </div>
        <div class="details-content">
      <p><strong>Name:</strong> <?= htmlspecialchars($testimonial['name']); ?></p>
      <p><strong>Position:</strong> <?= htmlspecialchars($testimonial['position']); ?></p>
      <p><strong>Review:</strong> <?= htmlspecialchars($testimonial['review']); ?></p>
      <a href="/testimonials" class="btn back-button">← Back to List</a>
         </div>
         </div>
    </section>


    </header>

   </body>
</html>
