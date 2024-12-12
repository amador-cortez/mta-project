<?php
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/';

    // Comprueba si la clase usa el prefijo
    if (strpos($class, $prefix) === 0) {
        $relativeClass = str_replace($prefix, '', $class);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});
?>