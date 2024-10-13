<?php
require '../helpers.php';

$routes = [
  '/' => 'controllers/home.php',
  '/find' => 'controllers/find.php',
  '/profile' => 'controllers/profile/profile.php',
  '/listings' => 'controllers/listings/index.php',
    '/listings/create' => 'controllers/listings/create.php',
  '404' => 'controllers/error/404.php',
  '/privacy-policy' => 'controllers/rights/privacy-policy.php',
  '/terms-of-service' => 'controllers/rights/terms-of-service.php',

];
$uri = $_SERVER['REQUEST_URI'];

//inspect($uri, true);

if (array_key_exists($uri, $routes)) {
    require (getBasePath($routes[$uri]));
} else{
    require (getBasePath($routes['404']));
}