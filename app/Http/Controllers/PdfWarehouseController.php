<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PdfWarehouseController extends Controller
{
    //
    public function generatePDF()
    {
        $fileName = Auth::user()->img ?: "N/A";
        $signature_path = 'assetsgambar/file/' . $fileName;
        $data = [
            'title' => 'Contoh PDF',
            'signature_path' => $signature_path,
        ];
        $pdf = Pdf::loadView('warehouse.pdf.so_warehouse', $data);
        return $pdf->stream();
        // return $pdf->download('contoh.pdf');
    }
}
