<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendresponse($message, $data = null, $code = 200){
        return response()->json( [
            'message' =>$message,
            'data' => $data
        ], $code );
    }
}
