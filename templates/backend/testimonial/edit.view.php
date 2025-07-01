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
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required/>
        </div>
        <div class="form-group">
          <label for="position">Position:</label>
          <input type="text" id="position" name="position" required></textarea>
        </div>
        <div class="form-group">
          <label for="message">Review:</label>
          <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <div class="form-group">
          <label for="image">Upload Image:</label>
          <input type="file" id="image" name="image" accept="image/*" />
        </div>
        <button type="submit" class="form-submit">Submit</button>
      </form>
      <br>

      <a href="/testimonials" class="btn back-button">← Back to List</a>
    </header>

   </body>
</html>
