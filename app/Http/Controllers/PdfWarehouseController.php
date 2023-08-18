<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfWarehouseController extends Controller
{
    //
    public function generatePDF(){
        $data = ['title' => 'Contoh PDF'];
        $pdf = Pdf::loadView('warehouse.pdf.so_warehouse', $data);
        return $pdf->stream();
        // return $pdf->download('contoh.pdf');
    }
}
