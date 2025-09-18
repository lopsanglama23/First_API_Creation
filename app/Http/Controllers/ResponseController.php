<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function responseSend($message, $data){
         return response()->json( [
            'message' =>$message,
            'data' => $data
        ]);
    }
}
