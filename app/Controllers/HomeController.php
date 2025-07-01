<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        require_once dirname(__DIR__, 2) . '/templates/frontend/home/home.view.php';
    }
}