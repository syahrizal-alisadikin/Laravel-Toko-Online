<?php

namespace App\Http\Controllers\API;

class ResponseFormatter
{
    protected static $response = [
        'metta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null
           
        ],
        'data' => null
    ];

    public static function success($data = null, $message = null)
    {
        self::$response['metta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['metta']['code']);

    }

    public static function error($data = null, $message = null,$code = 400)
    {
        self::$response['metta']['status'] = 'error';
        self::$response['metta']['code'] = $code;
        self::$response['metta']['message'] = $message;
        self::$response['data'] = $data;
       

        return response()->json(self::$response, self::$response['metta']['code']);

    }
}