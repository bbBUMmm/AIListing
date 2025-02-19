<?php

namespace App\Controllers;

use Framework\Database;
class HomeController
{
    protected $db;
    public function __construct(){
        $config = require getBasePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index(): void{
        $listings = $this->db->query('SELECT * FROM ais')->fetchAll();

        loadView('home', [
            'listings' => $listings
        ]);
    }
}