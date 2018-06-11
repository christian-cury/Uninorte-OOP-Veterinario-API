<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TokensController extends Controller{

    public static function validateToken($token){
        $response = DB::table('users');
        return true;
    }
}
