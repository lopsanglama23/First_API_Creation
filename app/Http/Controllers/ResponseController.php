<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
   public function responseSend($message, $data)
    {
        // Make sure $data is a paginator instance
        if ($data && method_exists($data, 'items')) {
            return response()->json([
                'message' => $message,
                'data' => $data->items(),
                'meta' => [
                    'current_page' => $data->currentPage(),
                    'per_page' => $data->perPage(),
                    'total' => $data->total(),
                    'last_page' => $data->lastPage(),
                    'next_page_url' => $data->nextPageUrl(),
                    'prev_page_url' => $data->previousPageUrl()
                ]
            ]);
        } else {
            // fallback if $data is not paginated
            return response()->json([
                'message' => $message,
                'data' => $data
          ]);
       }
   }
}
