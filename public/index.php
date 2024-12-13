<?php


require_once __DIR__ . '/../website/src/autoload.php';

require_once __DIR__ . '/../website/src/Router.php';

// Cargar controladores
use App\Controllers\Auth\AuthController;
use App\Controllers\UserController;
use App\Router;

// Crear una instancia del enrutador
$router = new Router();

// Pages routes
$router->addRoute('GET', '/', [new UserController(),'index']);
$router->addRoute('GET', '/register', [new UserController(),'create']);
$router->addRoute('GET', '/login', [new AuthController(),'login']);
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router->dispatch($requestUri, $requestMethod);



