<?php

namespace Pluralis\Website;

class Router {
    private $routes = [];

    public function add($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function dispatch($requestedRoute) {
        if (array_key_exists($requestedRoute, $this->routes)) {
            call_user_func($this->routes[$requestedRoute]);
        } else {
            $this->notFound();
        }
    }

    private function notFound() {
        http_response_code(404);
        include_once('../Website/src/views/not-found.php');
    }
}