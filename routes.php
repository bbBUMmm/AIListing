<?php

$router->get('/', 'HomeController@index');
$router->get('/listing/{id}', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create');
$router->get('/profile', 'ProfileController@index');
$router->get('/privacy-policy', 'RightsController@privacy');
$router->get('/terms-of-service', 'RightsController@terms');

$router->post('/listings', 'ListingController@store');