<?php

require_once __DIR__ . '/../Website/src/router.php';
require_once __DIR__ . '/../Website/vendor/autoload.php';

// Cargar controladores
use Pluralis\Website\Router;
use Pluralis\Website\Controllers\PageController;
use Pluralis\Website\Controllers\ContactController;

// Crear una instancia del enrutador
$router = new Router();

// Pages routes
$router->add('/', function() {
    $controller = new PageController();
    $controller->index();
});

$router->add('/inicio', function() {
    $controller = new PageController();
    $controller->index();
});

// Display route
$requestedRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestedRoute);


