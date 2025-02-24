<?php

namespace App\Controllers;

class RightsController
{
    public function terms(){
        loadView('terms');
    }

    public function privacy(){
        loadView('rights');
    }
}