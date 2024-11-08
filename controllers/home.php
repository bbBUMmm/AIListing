<?php

$config = require getBasePath('config/db.php');

$db = new Database($config);

$listings = $db->query('SELECT * FROM ais')->fetchAll();

loadView('home', [
    'listings' => $listings
]);