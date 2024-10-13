<?php
require '../helpers.php';

require getBasePath('RouterClass.php');

$router = new RouterClass();
$rotes = require getBasePath('routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);