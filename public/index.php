<?php
    require_once(__DIR__ . '/../app/config.php');
    require_once(__DIR__ .'/../app/router.php');

    $router = new Router();
    $router->run();
