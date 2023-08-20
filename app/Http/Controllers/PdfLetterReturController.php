<?php

namespace App\Http\Controllers;

use App\Models\LetterRetur;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use setasign\Fpdi\Fpdi;

class PdfLetterReturController extends Controller
{
    //
    public function generatePDF(LetterRetur $letterRetur)
    {
        $fileNameSales = $letterRetur->user?->img ?: "N/A";
        $fileNameWarehouse = $letterRetur->WName?->img ?: "N/A";
        $fileNameMarketing = $letterRetur->MName?->img ?: "N/A";
        $fileNamePpicMarketing = $letterRetur->MPName?->img ?: "N/A";
        $signature_sales= 'assetsgambar/file/' . $fileNameSales;
        $signature_warehouse = 'assetsgambar/file/' . $fileNameWarehouse;
        $signature_marketing = 'assetsgambar/file/' . $fileNameMarketing;
        $signature_marketing_ppic = 'assetsgambar/file/' . $fileNamePpicMarketing;

        $data = [
            'title' => 'Contoh PDF',
            'sales_name' => $letterRetur->user?->name ?: "N/A",
            'warehouse_name' => $letterRetur->SCName?->name ?: "N/A",
            'marketing_name' => $letterRetur->PName?->name ?: "N/A",
            'marketing_ppic_name' => $letterRetur->WName?->name ?: "N/A",
            'signature_sales' => $signature_sales,
            'signature_warehouse' => $signature_warehouse,
            'signature_marketing' => $signature_marketing,
            'signature_marketing_ppic' => $signature_marketing_ppic,
        ];
        $pdf = Pdf::loadView('letter_retur.pdf.letter_retur', $data);

        $pdfDirectory = public_path('assets/pdf/temp-pdf');
        $pdfFileName = 'hasil_pdf_' . $letterRetur->file;
        $tempPdf = $pdfDirectory . '/' . $pdfFileName;
        $pdf->save($tempPdf);

        $pdf = new FPDI();

        $pdfFiles = [
            public_path('/assets/pdf/letter-retur/' . $letterRetur->file),
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

        $outputFilename = 'Surat-Retur.pdf';
        $pdf->Output($outputFilename, 'D');

        return 'PDFs merged successfully.';
    }
}
