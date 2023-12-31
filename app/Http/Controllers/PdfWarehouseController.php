<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\WarehouseSn;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use setasign\Fpdi\Fpdi;

class PdfWarehouseController extends Controller
{
    //
    public function generatePDF(Warehouse $warehouse)
    {
        $fileNameCreated = $warehouse->user?->img ?: "N/A";
        $fileNameApproved = $warehouse->SCName?->img ?: "N/A";
        $fileName = $warehouse->PName?->img ?: "N/A";
        $fileNameWarehouse = $warehouse->WName?->img ?: "N/A";
        $fileNameLogistics = $warehouse->LName?->img ?: "N/A";

        $signature_created = 'assetsgambar/file/' . $fileNameCreated;
        $signature_approved = 'assetsgambar/file/' . $fileNameApproved;
        $signature_path = 'assetsgambar/file/' . $fileName;
        $signature_warehouse = 'assetsgambar/file/' . $fileNameWarehouse;
        $signature_logistics = 'assetsgambar/file/' . $fileNameLogistics;

        $description = $warehouse->description;
        $total_weight = $warehouse->total_weight;
        $total_koli = $warehouse->total_koli;
        $number_so = $warehouse->no_so;

        $warehouseUid = $warehouse->uid;
        $warehouseSN = WarehouseSn::where("warehouse_uid", $warehouseUid)->get();
        $data = [
            'title' => 'Contoh PDF',
            'created_name' => $warehouse->user?->name ?: "N/A",
            'approved_name' => $warehouse->SCName?->name ?: "N/A",
            'ppic_name' => $warehouse->PName?->name ?: "N/A",
            'warehouse_name' => $warehouse->WName?->name ?: "N/A",
            'logistics_name' => $warehouse->LName?->name ?: "N/A",

            'signature_created' => $signature_created,
            'signature_approved' => $signature_approved,
            'signature_path' => $signature_path,
            'signature_warehouse' => $signature_warehouse,
            'signature_logistics' => $signature_logistics,

            'description_warehouse' => $description,
            'number_so' => $number_so,
            'total_weight_warehouse' => $total_weight,
            'total_koli_warehouse' => $total_koli,
            'warehouseSN' => $warehouseSN,
        ];
        $pdf = Pdf::loadView('warehouse.pdf.so_warehouse', $data);

        $pdfDirectory = public_path('assets/pdf/temp-pdf');
        $pdfFileName = 'hasil_pdf_' . $warehouse->file;
        $tempPdf = $pdfDirectory . '/' . $pdfFileName;
        $pdf->save($tempPdf);

        $pdf = new FPDI();

        $pdfFiles = [
            public_path('/assets/pdf/file/' . $warehouse->file),
            $tempPdf,
        ];
        

        foreach ($pdfFiles as $file) {
            $pageCount = $pdf->setSourceFile($file);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $template = $pdf->importPage($pageNo);
                $size = $pdf->getTemplateSize($template);
                $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $pdf->useTemplate($template);
            }
        }

        File::delete($tempPdf);

        $outputFilename = 'SO-Gudang.pdf';
        $pdf->Output($outputFilename, 'I');

        return 'PDFs merged successfully.';
    }
}
