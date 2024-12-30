<?php

session_start();

require_once __DIR__ . '/../website/src/autoload.php';
require_once __DIR__ . '/../website/src/Router.php';

use App\Controllers\Auth\AuthController;
use App\Controllers\UserController;
use App\Controllers\MonitorsController;
use App\Controllers\MonitorController;
use App\Controllers\AlertsController;
use App\Router;


$router = new Router();

if (isset($_SESSION['id'])) {
    $router->addRoute('GET', '/login', function() {
        header("Location: /dashboard");
        exit();
    });

//if(isset($_SESSION['user_id'])) {
    $router->addRoute('GET', '/', [new UserController(),'index']);
//}else{

    $router->addRoute('GET', '/register', [new UserController(),'create']);
    $router->addRoute('POST', '/register', [new UserController(),'store']);

    $router->addRoute('GET', '/login', [new AuthController(),'login']);
    $router->addRoute('POST', '/login', [new AuthController(),'authentication']);

    $router->addRoute('GET', '/dashboard', [new MonitorsController(), 'index']);

    $router->addRoute('GET', '/dashboard', [new MonitorsController(), 'index']);
    $router->addRoute('GET', '/api/monitors', [new MonitorsController(), 'getMonitors']);
   // $router->addRoute('GET', '/api/monitorStatus', [new MonitorsController(), 'checkStatus']);


    $router->addRoute('GET', '/editMonitor', [new MonitorsController(), 'editMonitor']);


    $router->addRoute('GET', '/api/getMonitor', [new MonitorsController(), 'oneMonitor']);
    $router->addRoute('POST', '/api/editMonitor', [new MonitorsController(), 'edit']);

    $router->addRoute('GET', '/api/deleteMonitor',[new MonitorsController(), 'deleteMonitor']);


    $router->addRoute('GET', '/monitor', [new MonitorsController(), 'addMonitor']);
    $router->addRoute('POST', '/monitor', [new MonitorsController(), 'addURL']);

    #$router->addRoute('GET')
    #$router->addRoute('GET', '/send', [new AlertController(), 'send'])
   $router->addRoute('GET', '/logout', function() {
        session_unset();  // Elimina todas las variables de sesión
        session_destroy();  // Destruye la sesión
        header("Location: /login");  // Redirige al login
        exit();
    });

    $router->addRoute('GET', '/dashboard', [new MonitorsController(), 'index']);
    $router->addRoute('GET', '/monitor', [new MonitorsController(), 'addMonitor']);
    $router->addRoute('POST', '/monitor', [new MonitorsController(), 'addURL']);
    $router->addRoute('GET', '/alert', [new AlertsController(), 'send']);

} else {
    $router->addRoute('GET', '/', [new AuthController(), 'login']);

    $router->addRoute('GET', '/register', [new UserController(), 'create']);
    $router->addRoute('POST', '/register', [new UserController(), 'store']);

    $router->addRoute('GET', '/login', [new AuthController(), 'login']);
    $router->addRoute('POST', '/login', [new AuthController(), 'authentication']);
    $router->addRoute('GET', '/testMonitor', [new MonitorController(), 'testMonitor']);    

    $router->addRoute('GET', '/dashboard', function() {
        header("Location: /login"); 
        exit();
    });
}

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router->dispatch($requestUri, $requestMethod);

?>