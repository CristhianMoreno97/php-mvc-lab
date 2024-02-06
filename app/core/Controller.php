<?php
    class Controller {
        protected function render($view){
            require_once(__DIR__ . '/../views/' . $view . 'View.php');
        }
    }