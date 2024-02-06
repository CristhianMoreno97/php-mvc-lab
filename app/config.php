<?php
    $folder_path = dirname($_SERVER['SCRIPT_NAME']);
    $url_path = $_SERVER['REQUEST_URI'];
    $url = substr($url_path, strlen($folder_path));

    define('URL', $url);
    define('URL_ROOT', $folder_path);