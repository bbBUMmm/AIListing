<?php

namespace App\Controllers;

use Framework\Database;
use Framework\ValidationClass;
class ListingController
{
    protected $db;
    public function __construct(){
        $config = require getBasePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index($params): void{
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM ais WHERE idai = :id',
            $params)->fetch();


        if (!$listing) {
            ErrorController::notFound("AI not found");
            return;
        }
        //inspect($listing, false);

        loadPartial('head');

        loadPartial("navbar");

        loadView('aishow', [
            'listing' => $listing
        ]);

        loadPartial('footer');
    }

    public function create(){
        loadView("create");
    }

    public function find(){
        echo 'finding';
    }
}