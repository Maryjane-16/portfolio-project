<?php

namespace App\Controllers;

use App\Requests\Request;
use App\Models\UserAuthentication;
use PDO;

class RegisterController
{
    private $userAuth;

    public function __construct(PDO $db)
    {
        $this->userAuth = new UserAuthentication($db);
    }

    public function index()
    {
        require_once dirname(__DIR__, 2) . '/templates/auth/register.view.php';
    }

    public function register(Request $request)
    {
        if ($request->method() === 'POST') {

            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');
            $confirmPassword = $request->input('confirm_password');

            if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
                $_SESSION['error'] = "All fields are required.";
                header('Location: /register');
                exit();
            }

            if ($password !== $confirmPassword) {
                $_SESSION['error'] = "Passwords does not match.";
                header('Location: /register');
                exit();
            }

            $password = password_hash($password, PASSWORD_DEFAULT);

            $result = $this->userAuth->register($username, $email, $password);

            if ($result) {
                $_SESSION['success'] = "Registration Successful.";
                header('Location: /login');
                exit();
            } else {
                $_SESSION['error'] = "Registration failed: " . $result;
            }
        } else {
            $_SESSION['error'] = "Invalid request method.";
        }
    }
}
