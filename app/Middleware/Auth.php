<?php

namespace App\Middleware;

class Auth
{
    public static function isLoggedIn()
    {
        return isset($_SESSION["user"]) && $_SESSION["user"];
    }

    public static function requireLogin()
    {
        if(!self::isLoggedIn()){
            header('Location: /login');
            exit;
        }
    }
}

