<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{

    public static function failed($data = []){
        return self::response('failed', 0, $data);
    }

    public static function error($data = []){
        return self::response('error', 1, $data);
    }

    public static function success($data = []){
        return self::response('success', 3, $data);
    }

    private static function response($status, $code, $data){
        $response = [
            'status' => $status,
            'code' => $code,
            'data' => $data
        ];
        return response()->json($response);
    }
}
