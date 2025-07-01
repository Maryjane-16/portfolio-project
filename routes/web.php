<?php

use FastRoute\RouteCollector;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use App\Controllers\DashboardController;
use App\Controllers\TestimonialController;

return function (RouteCollector $r) {

    $r->addRoute('GET', '/', [HomeController::class, 'index']);
    $r->addRoute('GET', '/dashboard', [DashboardController::class, 'index']);

    $r->addRoute('GET', '/register', [RegisterController::class, 'index']);
    $r->addRoute('POST', '/register', [RegisterController::class, 'register']);

    $r->addRoute('GET', '/login', [LoginController::class, 'index']);
    $r->addRoute('POST', '/login', [LoginController::class, 'login']);
    $r->addRoute('GET', '/logout', [LogoutController::class, 'logout']);
    
    // Testimonial routes
    $r->addRoute('GET', '/testimonials', [TestimonialController::class, 'index']);
    $r->addRoute('GET', '/testimonials/create', [TestimonialController::class, 'create']);
    $r->addRoute('GET', '/testimonials/1/show', [TestimonialController::class, 'show']);
    $r->addRoute('POST', '/testimonials/store', [TestimonialController::class, 'store']);
    $r->addRoute('GET', '/testimonials/1/edit', [TestimonialController::class, 'edit']);
    $r->addRoute('POST', '/testimonials/update', [TestimonialController::class, 'update']);
    $r->addRoute('POST', '/testimonials/delete', [TestimonialController::class, 'delete']);
    
};  