<?php

namespace App\Http\Controllers;


use App\Models\Rma;
use setasign\Fpdi\Fpdi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class PdfRmaController extends Controller
{
    //
    public function generatePDF(Rma $rma)
    {
        $fileNameSales = $rma->user?->img ?: "N/A";
        $fileNameTechnician = $rma->TName?->img ?: "N/A";
        $fileNameQc = $rma->QName?->img ?: "N/A";
        $signature_sales = 'assetsgambar/file/' . $fileNameSales;
        $signature_technician = 'assetsgambar/file/' . $fileNameTechnician;
        $signature_qc = 'assetsgambar/file/' . $fileNameQc;
        $warranty = $rma->warranty;
        $description_rma = $rma->description;
        $kerusakan_rma = $rma->kerusakan;
        $perbaikkan_rma = $rma->perbaikkan;
        $data = [
            'title' => 'Contoh PDF',
            'sales_name' => $rma->user?->name ?: "N/A",
            'technician_name' => $rma->TName?->name ?: "N/A",
            'qc_name' => $rma->QName?->name ?: "N/A",
            'signature_sales' => $signature_sales,
            'signature_technician' => $signature_technician,
            'signature_qc' => $signature_qc,
            'warranty' => $warranty,
            'description_rma' => $description_rma,
            'kerusakan_rma' => $kerusakan_rma,
            'perbaikkan_rma' => $perbaikkan_rma,
        ];
        $pdf = Pdf::loadView('rma.pdf.rma', $data);

        $pdfDirectory = public_path('assets/pdf/temp-pdf');
        $pdfFileName = 'hasil_pdf_' . $rma->file;
        $tempPdf = $pdfDirectory . '/' . $pdfFileName;
        $pdf->save($tempPdf);

        $pdf = new FPDI();

        $pdfFiles = [
            public_path('/assets/pdf/rma/' . $rma->file),
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

        $outputFilename = 'RMA.pdf';
        $pdf->Output($outputFilename, 'I');

        return 'PDFs merged successfully.';
    }
}
