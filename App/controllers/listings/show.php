<?php

use Framework\Database;

$config = require getBasePath('config/db.php');
$db = new Database($config);

$id = $_GET['id'] ?? '';

$params = [
    'id' => $id
];

$listing = $db->query('SELECT * FROM ais WHERE idai = :id',
    $params)->fetch();

//inspect($listing, false);

loadPartial('head');

loadPartial("navbar");

loadView('aishow', [
    'listing' => $listing
]);

loadPartial('footer');