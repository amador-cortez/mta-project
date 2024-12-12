<?php
namespace App\views;

class Router {
    private array $routes = [];

    public function addRoute(string $method, string $path, callable $handler): void {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function dispatch(string $requestUri, string $requestMethod): void {
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match('#^' . $route['path'] . '$#', $requestUri, $matches)) {
                array_shift($matches);
                call_user_func_array($route['handler'], $matches);
                return;
            }
        }

        // Si no se encuentra una ruta, retorna un error 404
        http_response_code(404);
        echo json_encode(['error' => 'Ruta no encontrada']);
    }
}
?>