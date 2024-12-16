<?php

#
require_once __DIR__ . '/../website/src/autoload.php';

require_once __DIR__ . '/../website/src/Router.php';

// Cargar controladores
use App\Controllers\Auth\AuthController;
use App\Controllers\UserController;
use App\Router;

// Crear una instancia del enrutador
$router = new Router();

// Pages routes




##si el usuario esta loggeado entrara ala primera sesion de la ruta protegida
if(isset($_SESSION['user_id'])) {
    $router->addRoute('GET', '/', [new UserController(),'index']);
}else{
#si no hay sesion entrara aca, 
    $router->addRoute('GET', '/save', [new UserController(),'store']);
    $router->addRoute('GET', '/register', [new UserController(),'create']);
    $router->addRoute('GET', '/login', [new AuthController(),'login']);
    $router->addRoute('POST', '/register', [new UserController(), 'store']);


}


$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router->dispatch($requestUri, $requestMethod);



