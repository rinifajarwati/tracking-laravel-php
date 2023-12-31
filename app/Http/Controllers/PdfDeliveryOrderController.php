<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use setasign\Fpdi\Fpdi;

class PdfDeliveryOrderController extends Controller
{
    //
    public function generatePDF(DeliveryOrder $deliveryOrder)
    {
        $fileNameSales = $deliveryOrder->user?->img ?: "N/A";
        $fileNameLogisticsCoor = $deliveryOrder->CoorLogistics?->img ?: "N/A";
        $fileNameQc = $deliveryOrder->QcName?->img ?: "N/A";
        $fileNameLogistics = $deliveryOrder->LogisticsName?->img ?: "N/A";
        $fileNameLogisticsCustomer =$deliveryOrder->CustomerName?->img ?: "N/A";

        $signature_sales = 'assetsgambar/file/' . $fileNameSales;
        $signature_logistics_coor = 'assetsgambar/file/' . $fileNameLogisticsCoor;
        $signature_qc = 'assetsgambar/file/' . $fileNameQc;
        $signature_logistics = 'assetsgambar/file/' . $fileNameLogistics;
        $customer_name = $deliveryOrder->customer_name;

        $no_sj_do = $deliveryOrder->no_sj;
        $no_so_do = $deliveryOrder->no_so;
        $description_do = $deliveryOrder->description;
        $no_resi_do = $deliveryOrder->no_resi;
        $jasa_ekspedisi_do = $deliveryOrder->jasa_ekspedisi;
        $data = [
            'sales_name' => $deliveryOrder->user?->name ?: "N/A",
            'logistics_coor' => $deliveryOrder->CoorLogistics?->name ?: "N/A",
            'qc_name' => $deliveryOrder->QcName?->name ?: "N/A",
            'logistics_name' => $deliveryOrder->LogisticsName?->name ?: "N/A",
            'logistics_security_name' => $deliveryOrder->SecurityName?->name ?: "N/A",
            'customer_name' => $customer_name,

            'signature_sales' => $signature_sales,
            'signature_logistics_coor' => $signature_logistics_coor,
            'signature_qc' => $signature_qc,
            'signature_logistics' => $signature_logistics,

            'no_sj_do' => $no_sj_do,
            'no_so_do' => $no_so_do,
            'description_do' => $description_do,
            'no_resi_do' => $no_resi_do,
            'jasa_ekspedisi_do' => $jasa_ekspedisi_do,
        ];
        $pdf = Pdf::loadView('delivery_order.pdf.delivery_order', $data);

        $pdfDirectory = public_path('assets/pdf/temp-pdf');
        $pdfFileName = 'hasil_pdf_' . $deliveryOrder->file;
        $tempPdf = $pdfDirectory . '/' . $pdfFileName;
        $pdf->save($tempPdf);

        $pdf = new FPDI();

        $pdfFiles = [
            public_path('/assets/pdf/delivery-order/' . $deliveryOrder->file),
            $tempPdf,
        ];
        // dd($pdfFiles);

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

        $outputFilename = 'Delivery-Order.pdf';
        $pdf->Output($outputFilename, 'I');

        return 'PDFs merged successfully.';
    }
}
