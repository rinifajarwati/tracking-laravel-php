<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PdfWarehouseController extends Controller
{
    //
    public function generatePDF(Warehouse $warehouse)
    {
        $fileName = Auth::user()->img ?: "N/A";
        $fileNameCreated = Auth::user()->img ?: "N/A";
        $fileNameApproved = Auth::user()->img ?: "N/A";
        $fileNameWarehouse = $warehouse->WName?->img ?: "N/A";
        $fileNameLogistics = $warehouse->LName?->img ?: "N/A";
        $signature_path = 'assetsgambar/file/' . $fileName;
        $signature_created= 'assetsgambar/file/' . $fileNameCreated;
        $signature_approved = 'assetsgambar/file/' . $fileNameApproved;
        $signature_warehouse = 'assetsgambar/file/' . $fileNameWarehouse;
        $signature_logistics = 'assetsgambar/file/' . $fileNameLogistics;

        $data = [
            'title' => 'Contoh PDF',
            'signature_path' => $signature_path,
            'signature_created' => $signature_created,
            'signature_approved' => $signature_approved,
            'signature_warehouse' => $signature_warehouse,
            'signature_logistics' => $signature_logistics,
        ];
        $pdf = Pdf::loadView('warehouse.pdf.so_warehouse', $data);
        return $pdf->stream();
        // return $pdf->download('contoh.pdf');
    }
}
