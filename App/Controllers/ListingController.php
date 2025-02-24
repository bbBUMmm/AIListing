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

    public function store(): void{
        // security
        $allowedFields = ["ainame", "how_learned", "usage", "future_projects", "notes"];

        $newAllowedData = array_intersect_key($_POST, array_flip($allowedFields));

//        For now, it is just hardcoded
//        $newAllowedData["user_id"] = 1;

        $newSanitizedData = array_map('sanitize', $newAllowedData);

        $requiredFields = ["ainame", "how_learned", "usage", "future_projects", "notes"];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newSanitizedData[$field]) || ValidationClass::string($newSanitizedData[$field])) {
                $errors[$field] = ucfirst($field) . " is required";
                $_SESSION['error_message'][$field] = ucfirst($field) . " is required";
            }
        }

        if (!empty($errors)) {
            loadView("create", [
//                'errors' => $errors,
//                'data' => $newSanitizedData
            ]);
        } else {
            $fieldsForDatabase = [];

            foreach ($newSanitizedData as $field => $value){
                $fieldsForDatabase[] = "`$field`";
            }

            $fieldsForDatabase = implode(', ', $fieldsForDatabase);

            $valuesForDatabase = [];

            foreach ($newSanitizedData as $field => $value){
                // Convert empty strings to null
                if ($value === ''){
                    $newSanitizedData[$field] = null;
                }
                $valuesForDatabase[] = ':'.$field;
            }

            $valuesForDatabase = implode(', ', $valuesForDatabase);

            $query = "INSERT INTO ais ({$fieldsForDatabase}) VALUES ({$valuesForDatabase})";

            $this->db->query($query, $newSanitizedData);

            redirect("/");
        }
    }

    public function destroy($params): void
    {
        $id = $params['id'];

//       Extract id to format it then to the db query parameters
        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM ais WHERE idai = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notFound("AI not found");
            $_SESSION['error_message'] = "AI not found";
            return;
        }

        $this->db->query('DELETE FROM ais WHERE idai = :id', $params);

        $_SESSION['success_message'] = "AI deleted successfully";

        redirect('/');
    }
}