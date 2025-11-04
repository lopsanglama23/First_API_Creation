<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
class PdfController extends Controller
{

    public function pdfGenerator($application_id){
        $applys = Application::with('dog')->findOrFail($application_id); 

        $pdf = Pdf::loadView('dogsDescription',['applys'=>$applys]);
        return $pdf->download('dog.pdf');
    }
}
