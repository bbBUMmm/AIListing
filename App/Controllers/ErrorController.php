<?php

namespace App\Controllers;

class ErrorController
{
    public static function notFound($message = "Resource Not Found"){
        http_response_code(404);

        loadView('error', [
            'message' => $message,
            'status' => 404
        ]);
    }

}