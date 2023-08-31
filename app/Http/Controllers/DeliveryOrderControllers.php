<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Helper\HelperController;

class DeliveryOrderControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            "title" => "Delivery Order | IMI Tracking",
            "auth_pos" => auth()->user()->position_uid,
            "auth_div" => auth()->user()->division_uid,
        ];
        return view('delivery_order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
        try {
            $uid = (new HelperController)->getUid();

            $payload = [
                'uid' => $uid,
                'user_uid' => auth()->user()->uid,
                'no_so' => request('no_so'),
                'no_sj' => request('no_sj'),
                'description' => request('description'),
                'file' => request('file'),
                'no_resi' => request('no_resi'),
                'jasa_ekspedisi' => request('jasa_ekspedisi'),
                'created_date' => Carbon::now(),
                'status' => 'Created',
            ];
            // dd($payload);
            $file =  request()->file('file');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public_uploads_delivery_order')->put($fileName, file_get_contents($file));
            $payload['file'] = $fileName;

            DeliveryOrder::create($payload);
            return back()->with(['alertSuccess' => 'Successfully create file!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return back()->with(['alertError' => 'file already Registered!']);
            }
            return back()->with(['alertError' => 'Failed to add new file!']);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryOrder $deliveryOrder)
    {
        //
        try {
            if (request()->hasFile('img')) {
                $img = request()->file('img');
                $fileImg = Str::random(40) . '.' . $img->getClientOriginalExtension();
                Storage::disk('public_uploads_img_resi')->put($fileImg, file_get_contents($img));
                $deliveryOrder['img'] = $fileImg;
            }
            $deliveryOrder->update(request()->except('img'));

            return redirect('/delivery-order')->with(['alertSuccess' => 'Successfully updated delivery order!']);
        } catch (Throwable $th) {
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/delivery-order')->with(['alertError' => 'Location already delivery order!']);
            }
            return redirect('/delivery-order')->with(['alertError' => 'Failed to updated delivery order!']);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryOrder $deliveryOrder)
    {
        //
    }

    public function datatables()
    {
        $notFinished = DeliveryOrder::whereNotIn('status', ['Approval-Customer'])->get();
        return $notFinished;
    }

    public function approvedSales(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Coor',
                'coor_logistics_name' => auth()->user()->uid,
                'coor_logistics_date' => Carbon::now(),
            ];

            DeliveryOrder::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Delivery Order']);
        } catch (Throwable $e) {
            dd($e);
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //Approved Qc
    public function datatablesQc()
    {
        $notFinished = DeliveryOrder::whereNotIn('status', ['Approval-Customer'])->get();
        return $notFinished;
    }

    public function approvedQc(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Qc',
                'qc_name' => auth()->user()->uid,
                'qc_date' => Carbon::now(),
            ];

            DeliveryOrder::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Delivery Order']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //Approved Qc
    public function datatablesLogistics()
    {
        $notFinished = DeliveryOrder::whereNotIn('status', ['Approval-Customer'])->get();
        return $notFinished;
    }

    public function approvedLogistics(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Logistics',
                'logistics_name' => auth()->user()->uid,
                'logistics_date' => Carbon::now(),
            ];

            DeliveryOrder::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Delivery Order']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }
    public function approvedCustomer(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Customer',
                'logistics_customer_name' => auth()->user()->uid,
                'logistics_customer_date' => Carbon::now(),
            ];
            DeliveryOrder::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Delivery Order']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }


    //finish

    public function datatablesFinish()
    {

        $finish = DeliveryOrder::where('status', 'Approval-Customer')->get();
        return $finish;
    }

    public function Finish()
    {

        $data = [
            "title" => "Finish Delivery Order | IMI Tracking",
        ];
        return view('delivery_order.finish', $data);
    }
    //pdf Delivery Order
    public function showPdf(DeliveryOrder $deliveryOrder)
    {
        $fileNameSales = $deliveryOrder->user?->img ?: "N/A";
        $fileNameSalesCoor = $deliveryOrder->SalesName2?->img ?: "N/A";
        $fileNameQc = $deliveryOrder->QcName?->img ?: "N/A";
        $fileNameLogistics = $deliveryOrder->LogisticsName?->img ?: "N/A";
        $fileNameLogisticsSecurity = $deliveryOrder->SecurityName?->img ?: "N/A";
        $fileNameLogisticsCustomer = $deliveryOrder->CustomerName?->img ?: "N/A";

        $signature_sales = 'assetsgambar/file/' . $fileNameSales;
        $signature_sales_coor = 'assetsgambar/file/' . $fileNameSalesCoor;
        $signature_qc = 'assetsgambar/file/' . $fileNameQc;
        $signature_logistics = 'assetsgambar/file/' . $fileNameLogistics;
        $signature_logistics_security = 'assetsgambar/file/' . $fileNameLogisticsSecurity;
        $signature_logistics_customer = 'assetsgambar/file/' . $fileNameLogisticsCustomer;

        $data = [
            'sales_name' => $deliveryOrder->user?->name ?: "N/A",
            'sales_coor_name' => $deliveryOrder->SalesName2?->name ?: "N/A",
            'qc_name' => $deliveryOrder->QcName?->name ?: "N/A",
            'logistics_name' => $deliveryOrder->LogisticsName?->name ?: "N/A",
            'logistics_security_name' => $deliveryOrder->SecurityName?->name ?: "N/A",
            'logistics_customer_name' => $deliveryOrder->CustomerName?->name ?: "N/A",

            'signature_sales' => $signature_sales,
            'signature_sales_coor' => $signature_sales_coor,
            'signature_qc' => $signature_qc,
            'signature_logistics' => $signature_logistics,
            'signature_logistics_security' => $signature_logistics_security,
            'signature_logistics_customer' => $signature_logistics_customer,

        ];
        return view('delivery_order.pdf.delivery_order', $data);
    }
}
