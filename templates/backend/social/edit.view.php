<!-- socials/edit.view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Social Links</title>
    <link rel="stylesheet" href="/assets/backend/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>

    <?php require_once dirname(__DIR__, 3) . '/templates/backend/sidebar.view.php' ?>

    <main>
        <header>
            <h1>Edit Social Links</h1>
            <br><br>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error'] ?> </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= $_SESSION['success'] ?> </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <div id="edit" class="card">
                <form method="POST" action="/social/<?= htmlspecialchars($social['id']) ?>/update">
                    <div class="form-group">
                        <label for="facebook">Facebook:</label>
                        <input type="url" id="facebook" name="facebook"
                            value="<?= htmlspecialchars($social['facebook']); ?>"
                            placeholder="https://facebook.com/username" required />
                    </div>

                    <div class="form-group">
                        <label for="twitter">Twitter:</label>
                        <input type="url" id="twitter" name="twitter"
                            value="<?= htmlspecialchars($social['twitter']); ?>"
                            placeholder="https://twitter.com/username" required />
                    </div>

                    <div class="form-group">
                        <label for="github">GitHub:</label>
                        <input type="url" id="github" name="github"
                            value="<?= htmlspecialchars($social['github']); ?>"
                            placeholder="https://github.com/username" required />
                    </div>

                    <div class="form-group">
                        <label for="linkedin">Linkedin:</label>
                        <input type="url" id="linkedin" name="linkedin"
                            value="<?= htmlspecialchars($social['linkedin']); ?>"
                            placeholder="https://linkedin.com/in/username" required />
                    </div>

                    <div class="form-group">
                        <label for="instagram">Instagram:</label>
                        <input type="url" id="instagram" name="instagram"
                            value="<?= htmlspecialchars($social['instagram']); ?>"
                            placeholder="https://instagram.com/username" required />
                    </div>

                    <button type="submit" class="form-submit">Update</button>
                </form>
            </div>
        </header>
    </main>

</body>

</html>