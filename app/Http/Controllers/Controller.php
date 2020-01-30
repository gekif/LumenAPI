<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function createSuccessReponse($data, $code)
    {
        return response()->json([
            'data' => $data
        ], $code);
    }

    public function createErrorMessage($message, $code)
    {
        return response()->json([
            'message' => $message,
            'code' => $code
        ], $code);
    }
}
