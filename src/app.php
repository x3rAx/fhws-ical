<?php

define('APP_ROOT', realpath(__DIR__));

$request = $_SERVER['REQUEST_URI'];

function tpl(string $name, array $data = []) {
    require APP_ROOT . "/templates/${name}.php";
}

function show404($message = 'The page you have requested could not be found.') {
    header("HTTP/1.0 404 Not Found");

    tpl('header', ['pageHeader' => '404']);
    tpl('404', ['message' => $message]);
    tpl('footer');

    exit();
}

$routes = [
    '/^\/[^\/]+?\.ics$/' => 'ical',
    '/^\/$/'             => 'home',
];

foreach ($routes as $regex => $controller) {
    if (preg_match($regex, $request)) {
        ob_start();
        require APP_ROOT . "/controller/${controller}.php";
        ob_end_flush();
        exit();
    }
}

show404();

