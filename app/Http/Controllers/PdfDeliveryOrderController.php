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
        $signature_logistics_customer = 'assetsgambar/file/' . $fileNameLogisticsCustomer;

        $data = [
            'sales_name' => $deliveryOrder->user?->name ?: "N/A",
            'logistics_coor' => $deliveryOrder->CoorLogistics?->name ?: "N/A",
            'qc_name' => $deliveryOrder->QcName?->name ?: "N/A",
            'logistics_name' => $deliveryOrder->LogisticsName?->name ?: "N/A",
            'logistics_security_name' => $deliveryOrder->SecurityName?->name ?: "N/A",
            'logistics_customer_name' => $deliveryOrder->CustomerName?->name ?: "N/A",

            'signature_sales' => $signature_sales,
            'signature_logistics_coor' => $signature_logistics_coor,
            'signature_qc' => $signature_qc,
            'signature_logistics' => $signature_logistics,
            'signature_logistics_customer' => $signature_logistics_customer,
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
