<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f8f9fa;
        }

        .register-box {
            max-width: 500px;
            margin: auto;
            margin-top: 80px;
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
    <div class="register-box">
        <div class="form-title">Create Your Account</div>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?> </div>
            <?php unset($_SESSION['error']);?>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="name" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="emailReg" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="emailReg" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label for="passwordReg" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="passwordReg" placeholder="Create password" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirmPassword" placeholder="Confirm password" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
            <div class="text-center mt-3">
                Already have an account? <a href="/login">Login</a>
            </div>
        </form>
        
    </div>
</body>

</html>