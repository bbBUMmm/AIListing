<?php
require '../helpers.php';
require getBasePath('Database.php');
require getBasePath('RouterClass.php');

$config = require getBasePath('config/db.php');

$db = new Database($config);

$router = new RouterClass();
$rotes = require getBasePath('routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);