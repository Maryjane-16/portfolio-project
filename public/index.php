<?php

require_once '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Requests\Request;
use FastRoute\Dispatcher;
use App\Controllers\FaqController;
use App\Models\DatabaseConnection;
use App\Controllers\HomeController;
use App\Controllers\IntroController;
use App\Controllers\LoginController;
use App\Controllers\SocialController;
use App\Controllers\CompanyController;
use App\Controllers\ContactController;
use App\Controllers\ServiceController;
use App\Controllers\RegisterController;
use App\Controllers\PortfolioController;
use App\Controllers\TestimonialController;

session_start();

// load environment variables
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

require_once 'helpers.php';

// Prepare our DB connection
$dbConn = new DatabaseConnection;
$pdo = $dbConn->databaseConnection();

// Define our routes
$dispatcher = \FastRoute\simpleDispatcher(require_once '../routes/web.php');

// Dispatch the route and handle the request
$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        echo '404 - PAGE NOT FOUND';
        break;
    case Dispatcher::FOUND:
        [$controllerClass, $controllerMethod] = $routeInfo[1];
        $vars = $routeInfo[2];

        // Inject PDO only if required
        if (
            $controllerClass === RegisterController::class || $controllerClass === LoginController::class ||
            $controllerClass === TestimonialController::class || $controllerClass === IntroController::class
            || $controllerClass === ContactController::class || $controllerClass === HomeController::class
            || $controllerClass === FaqController::class || $controllerClass === PortfolioController::class
            || $controllerClass === CompanyController::class || $controllerClass === ServiceController::class
            || $controllerClass === SocialController::class
        ) {
            $controller = new $controllerClass($pdo);
        } else {
            $controller = new $controllerClass();
        }

        $request = new Request();
        $controller->$controllerMethod($request, $vars);
        break;
}
