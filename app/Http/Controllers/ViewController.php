<?php

namespace App\Http\Controllers;
use App\Models\Dog;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view(Request $request){
        $dogs= Dog::all();
        return response()->json([
            'message'=> 'All added dogs',
            'Dogs' => $dogs,
        ]);
    }
}
