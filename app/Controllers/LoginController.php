<?php

namespace App\Controllers;

use PDO;
use App\Models\UserAuthentication;
use App\Requests\Request;

class LoginController
{
    private $userAuth;

    public function __construct(PDO $db)
    {
        $this->userAuth = new UserAuthentication($db);
    }

    public function index()
    {
        require_once dirname(__DIR__, 2) . '/templates/auth/login.view.php';
    }

    public function login(Request $request)
    {
        if ($request->method() === 'POST'){
            $email = $request->input('email');
            $password = $request->input('password');

            if (empty($email) || empty($password)){
                $_SESSION['error'] = "All fields are required.";
                header('Location: /login');
                exit();
            }

            $user = $this->userAuth->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: /dashboard');
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password";
                header('Location: /login');
                exit();
            }
    
    } else {
        $_SESSION['error'] = "Invalid request method.";
    }
}

}