<?php

namespace App\Http\Controllers;

use App\Imports\DogImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DogImportController extends Controller
{
    public function dogImport(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new DogImport(), $request->file('file'));

        return response()->json([
            'message ' => 'The import porcess is done'
        ]);
    }
}
