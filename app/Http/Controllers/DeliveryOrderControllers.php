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
                'created_date' => Carbon::now(),
            ];
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
    public function show(DeliveryOrder $devliveryOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryOrder $devliveryOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeliveryOrder $devliveryOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryOrder $devliveryOrder)
    {
        //
    }

    public function datatables()
    {
        $user = auth()->user()->uid;

        return DeliveryOrder::where('user_uid', $user)->get()->toArray();
    }


    public function approved(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Sales',
                'sales1_name' => auth()->user()->uid,
                'sales1_date' => Carbon::now(),
            ];

            DeliveryOrder::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Delivery Order']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function approvedSales(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Coor',
                'sales2_name' => auth()->user()->uid,
                'sales2_date' => Carbon::now(),
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
        return DeliveryOrder::all();
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
        return DeliveryOrder::all();
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
    public function approvedSecurity(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Security',
                'logistics_security_name' => auth()->user()->uid,
                'logistics_security_date' => Carbon::now(),
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
            return back()->with(['alertSuccess' => 'Successfully For Approved Delivery Ordera']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

          //pdf Delivery Order
          public function showPdf(string $uid)
          {
              $pdf = DeliveryOrder::where("uid", $uid)->get();
              
              $data = [
                  "title" => "Delivery Order | IMI Tracking",
                  "pdf" => $pdf,
              ];
              return view('delivery_order.pdf.delivery_order', $data);
          }
}
