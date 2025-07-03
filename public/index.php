<?php

require_once '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Requests\Request;
use FastRoute\Dispatcher;
use App\Models\DatabaseConnection;
use App\Controllers\IntroController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\TestimonialController;

session_start();

// load environment variables
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

// Prepare our DB connection
$dbConn = new DatabaseConnection;
$pdo = $dbConn->databaseConnection();

// Define our routes
$dispatcher = \FastRoute\simpleDispatcher(require_once '../routes/web.php');

// Dispatch the route and handle the request
$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($routeInfo[0]){
    case Dispatcher::NOT_FOUND:
        echo '404 - PAGE NOT FOUND';
        break;
    case Dispatcher::FOUND:
        [$controllerClass, $controllerMethod] = $routeInfo[1];
        $vars = $routeInfo[2];

        // Inject PDO only if required
        if ($controllerClass === RegisterController::class || $controllerClass === LoginController::class || 
        $controllerClass === TestimonialController::class || $controllerClass === IntroController::class){
            $controller = new $controllerClass($pdo);
        } else {
            $controller = new $controllerClass();
        }
        
        $request = new Request();
        $controller->$controllerMethod($request, $vars);
        break;
}