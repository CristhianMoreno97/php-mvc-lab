<?php
    class Controller {
        protected function render($view, $parameters = [], $layout = 'site'){
            ob_start();
            require_once(__DIR__ . '/../views/' . $view . 'View.php');
            $content = ob_get_clean();
            require_once(__DIR__ . '/../views/layouts/' . $layout . 'Layout.php');
        }
    }