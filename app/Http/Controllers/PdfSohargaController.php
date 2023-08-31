<?php

namespace App\Http\Controllers;

use App\Models\Soharga;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use setasign\Fpdi\Fpdi;

class PdfSohargaController extends Controller
{
    //
    public function generatePDF(Soharga $soharga)
    {
        // dd($soharga);
        $fileNameSales = $soharga->user?->img ?: "N/A";
        $fileNameAdminsales = $soharga->SName?->img ?: "N/A";
        $signature_sales = 'assetsgambar/file/' . $fileNameSales;
        $signature_adminsales = 'assetsgambar/file/' . $fileNameAdminsales;

        $data = [
            'title' => 'Contoh PDF',
            'sales_name' => $soharga->user?->name ?: "N/A",
            'adminsales_name' => $soharga->SName?->name ?: "N/A",
            'signature_sales' => $signature_sales,
            'signature_adminsales' => $signature_adminsales,
        ];
        $pdf = Pdf::loadView('soharga.pdf.so_harga', $data);

        $pdfDirectory = public_path('assets/pdf/temp-pdf');
        $pdfFileName = 'hasil_pdf_' . $soharga->file;
        $tempPdf = $pdfDirectory . '/' . $pdfFileName;
        $pdf->save($tempPdf);

        $pdf = new FPDI();

        $pdfFiles = [
            public_path('/assets/pdf/file/' . $soharga->file),
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

        $outputFilename = 'SO-Harga.pdf';
        $pdf->Output($outputFilename, 'I');

        return 'PDFs merged successfully.';
    }
}
