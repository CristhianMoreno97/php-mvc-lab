<?php

    class Router {
        private $controller;
        private $method;

        public function __construct() {
            $this->matchRoute();
        }

        public function matchRoute() {
            $url = explode('/', URL);

            if (!empty($url[1])) {
                $this->controller = ucfirst($url[1]) . 'Controller';
            } else {
                $this->controller = 'PageController';
            }

            require_once(__DIR__ . '/controllers/' . $this->controller . '.php');

            if (!empty($url[2])) {
                $this->method = $url[2];
            } else {
                $this->method = 'home';
            }
        }

        public function run() {
            $controller = new $this->controller;
            $controller->{$this->method}();
        }
    }
