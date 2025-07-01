<?php

namespace App\Controllers;

use App\Middleware\Auth;

class DashboardController
{
    public function index()
    {
        Auth::requireLogin();
        require_once dirname(__DIR__, 2) . '/templates/backend/dashboard/dashboard.view.php';
    }
}