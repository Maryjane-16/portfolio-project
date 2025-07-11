<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f8f9fa;
        }

        .login-box {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="form-title">Login to Your Account</div>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?> </div>
            <?php unset($_SESSION['error']);?>
        <?php endif; ?>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?> </div>
            <?php unset($_SESSION['success']);?>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="text-center mt-3">
                <a href="#">Forgot Password?</a> | <a href="/register">Register</a>
            </div>
        </form>
    </div>
</body>

</html>