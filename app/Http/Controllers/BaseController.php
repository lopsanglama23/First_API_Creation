<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class BaseController extends Controller
{
    public function sendresponse($message, $data = null, $code = 200){
        return response()->json( [
            'message' =>$message,
            'data' => $data
        ], $code );
    }
    public function errorresponse($message, $data = null, $code = 400){
        return response()->json([
            'message' => $message,
        ],$code);
    }
}
