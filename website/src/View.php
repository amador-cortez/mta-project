<?php

namespace App;

class View
{
    public static function render(string $view, $data = []):  void {
        extract($data);

        ob_start();

        include __DIR__ . '/../views/' . $view . '.php';

        $content = ob_get_clean();

        include __DIR__ . '/../views/layout.php';
    }



}