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
            <h1>Edit Intro Text</h1>
            <br> <br>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error'] ?> </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= $_SESSION['success'] ?> </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <div id="create" class="card">
                <form method="POST" action="/intro/update/<?= htmlspecialchars($intro['id']) ?>">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="<?= htmlspecialchars($intro['title']); ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" value="<?= htmlspecialchars($intro['description']); ?>" required></textarea>
                    </div>
                    <button type="submit" class="form-submit">Update</button>
                </form>
        </header>

</body>

</html>