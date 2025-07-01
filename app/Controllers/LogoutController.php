<?php

namespace App\Controllers;

use App\Middleware\Auth;

class LogoutController
{
    public function logout()
    {
        Auth::requirelogin();
        
        $_SESSION = [];

        session_destroy();

        header('Location: /login');
        exit;
    }
}