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
      <h1>Edit Testimonial</h1>

      <div id="create" class="card">
      <h2>Add Testimonial</h2>
      <form method="POST" action="/testimonials/update/<?= htmlspecialchars($testimonial['id']) ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value="<?= htmlspecialchars($testimonial['name']); ?>" required/>
        </div>
        <div class="form-group">
          <label for="position">Position:</label>
          <input type="text" id="position" name="position" value="<?= htmlspecialchars($testimonial['position']); ?>"required></textarea>
        </div>
        <div class="form-group">
          <label for="review">Review:</label>
          <textarea id="review" name="review" rows="4" required><?= htmlspecialchars($testimonial['review']); ?></textarea>
        </div>
        <div class="form-group">
          <label for="photo">Current Photo:</label>
          <input type="file" id="photo" name="photo" accept="image/*" />
          <img src="http://localhost/portfolio-project/storage/<?= htmlspecialchars($testimonial["photo"]); ?>" alt="Jane Doe" />
        </div>
        </div>
        <button type="submit" class="form-submit">Update</button>
      </form>
      <br>

      <a href="/testimonials" class="btn back-button">← Back to List</a>
    </header>

   </body>
</html>
