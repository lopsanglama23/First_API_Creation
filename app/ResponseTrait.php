<?php

namespace App;

trait ResponseTrait
{
    public function successResponse($data, $message, $status = 200){
        return response()->json([
            "data"=> $data,
            "message"=> "success",
        ], $status);
    }
    public function errorResponse($message, $status = 400){
            return response()->json([
                "message"=>"error"
            ], $status);
        }
}
