<?php

namespace App\Helpers;

use JsonSerializable;

final class ApiResponseHelper
{
    public static function jsonResponse(JsonSerializable $data, bool $success = true)
    {
        $response['success'] = $success;
        $response['results'] = $data;

        return response()->json($response);
    }

    public static function jsonErrorResponse($data, string $field = 'message')
    {
        $response['success'] = false;
        $response[$field]    = $data;

        return response()->json($response);
    }
}

