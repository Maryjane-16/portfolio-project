<?php

use FastRoute\RouteCollector;
use App\Controllers\FaqController;
use App\Controllers\HomeController;
use App\Controllers\IntroController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\SocialController;
use App\Controllers\CompanyController;
use App\Controllers\ContactController;
use App\Controllers\ServiceController;
use App\Controllers\RegisterController;
use App\Controllers\DashboardController;
use App\Controllers\PortfolioController;
use App\Controllers\TestimonialController;
use App\Controllers\Frontend\IntroController as FrontendIntroController;

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
    $r->addRoute('GET', '/testimonials/{id}/show', [TestimonialController::class, 'show']);
    $r->addRoute('POST', '/testimonials/store', [TestimonialController::class, 'store']);
    $r->addRoute('GET', '/testimonials/{id}/edit', [TestimonialController::class, 'edit']);
    $r->addRoute('POST', '/testimonials/update/{id}', [TestimonialController::class, 'update']);
    $r->addRoute('POST', '/testimonials/delete/{id}', [TestimonialController::class, 'destroy']);

    // Intro route
    $r->addRoute('GET', '/intro/{id}/edit', [IntroController::class, 'edit']);
    $r->addRoute('POST', '/intro/update/{id}', [IntroController::class, 'update']);

    // contact route
    $r->addRoute('POST', '/', [ContactController::class, 'store']);
    $r->addRoute('GET', '/contacts', [ContactController::class, 'index']);
    $r->addRoute('POST', '/contacts/delete/{id}', [ContactController::class, 'destroy']);

    // faq route
    $r->addRoute('GET', '/faqs', [FaqController::class, 'index']);
    $r->addRoute('GET', '/faqs/create', [FaqController::class, 'create']);
    $r->addRoute('POST', '/faqs/store', [FaqController::class, 'store']);
    $r->addRoute('GET', '/faqs/{id:\d+}', [FaqController::class, 'show']);
    $r->addRoute('GET', '/faqs/edit/{id:\d+}', [FaqController::class, 'edit']);
    $r->addRoute('POST', '/faqs/update/{id:\d+}', [FaqController::class, 'update']);
    $r->addRoute('POST', '/faqs/delete/{id:\d+}', [FaqController::class, 'delete']);

    // Portfolio route
    $r->addRoute('GET', '/portfolios', [PortfolioController::class, 'index']);
    $r->addRoute('GET', '/portfolios/create', [PortfolioController::class, 'create']);
    $r->addRoute('POST', '/portfolios/store', [PortfolioController::class, 'store']);
    $r->addRoute('GET', '/portfolios/{id:\d+}/show', [PortfolioController::class, 'show']);
    $r->addRoute('GET', '/portfolios/{id:\d+}/edit', [PortfolioController::class, 'edit']);
    $r->addRoute('POST', '/portfolios/update/{id:\d+}', [PortfolioController::class, 'update']);
    $r->addRoute('POST', '/portfolios/{id:\d+}/delete', [PortfolioController::class, 'delete']);

    // Company route
    $r->addRoute('GET', '/companies', [CompanyController::class, 'index']);
    $r->addRoute('GET', '/companies/create', [CompanyController::class, 'create']);
    $r->addRoute('POST', '/companies/store', [CompanyController::class, 'store']);
    $r->addRoute('GET', '/companies/{id:\d+}/show', [CompanyController::class, 'show']);
    $r->addRoute('GET', '/companies/{id:\d+}/edit', [CompanyController::class, 'edit']);
    $r->addRoute('POST', '/companies/{id:\d+}/update', [CompanyController::class, 'update']);
    $r->addRoute('POST', '/companies/{id:\d+}/delete', [CompanyController::class, 'delete']);

    // Service routes
    $r->addRoute('GET', '/services', [ServiceController::class, 'index']);
    $r->addRoute('GET', '/services/create', [ServiceController::class, 'create']);
    $r->addRoute('POST', '/services/store', [ServiceController::class, 'store']);
    $r->addRoute('GET', '/services/{id:\d+}/edit', [ServiceController::class, 'edit']);
    $r->addRoute('POST', '/services/{id:\d+}/update', [ServiceController::class, 'update']);
    $r->addRoute('POST', '/services/{id:\d+}/delete', [ServiceController::class, 'delete']);

    // social route
    $r->addRoute('GET', '/social/{id}/edit', [SocialController::class, 'edit']);
    $r->addRoute('POST', '/social/{id}/update', [SocialController::class, 'update']);
};
