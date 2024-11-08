<?php
require '../helpers.php';
require getBasePath('Database.php');
require getBasePath('RouterClass.php');

$config = require getBasePath('config/db.php');

$db = new Database($config);

// Creating the router
$router = new RouterClass();

// Get routes
$rotes = require getBasePath('routes.php');

// Get current URI and HTTP method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);