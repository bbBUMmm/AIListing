<?php

use Framework\Database;
use Framework\RouterClass;

require '../helpers.php';
require __DIR__ . '/../vendor/autoload.php';

// Basic class autoloader
// Good for small applications
//spl_autoload_register(function ($class) {
//    $path = getBasePath('Framework/' . $class . '.php');
//    if (file_exists($path)) {
//        require_once $path;
//    }
//});

$config = require getBasePath('config/db.php');

$db = new Database($config);

// Creating the router
$router = new RouterClass();

// Get routes
$rotes = require getBasePath('routes.php');

// Get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'],
PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);