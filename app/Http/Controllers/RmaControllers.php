<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Rma;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Helper\HelperController;

class RmaControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            "title" => "RMA | IMI Tracking",
        ];
        return view('rma.index', $data);
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
                'no_spk' => request('no_spk'),
                'description' => request('description'),
                'file' => request('file'),
                'warranty' => request('warranty'),
                'created_date' => Carbon::now(),
                'status' => 'Created',
            ];
            $file =  request()->file('file');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public_uploads_rma')->put($fileName, file_get_contents($file));
            $payload['file'] = $fileName;
            Rma::create($payload);
            return back()->with(['alertSuccess' => 'Successfully create RMA!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return back()->with(['alertError' => 'RMA already Registered!']);
            }
            return back()->with(['alertError' => 'Failed to add new RMA!']);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Rma $rma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rma $rma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rma $rma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rma $rma)
    {
        //

    }
    public function datatables()
    {
        $user = auth()->user()->uid;
        return Rma::where('user_uid', $user)->get()->toArray();
    }

    //approved technician
    public function datatablesTechnician()
    {
        return rma::all();
    }

    public function approvedTechnician(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Technician',
                'technician_name' => auth()->user()->uid,
                'technician_date' => Carbon::now(),
            ];

            Rma::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file RMA']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //Approved Qc
    public function datatablesQc()
    {
        return Rma::all();
    }

    public function approvedQc(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Qc',
                'qc_name' => auth()->user()->uid,
                'qc_date' => Carbon::now(),
            ];

            Rma::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file RMA']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //pdf rma
    public function showPdf(Rma $rma)
    {
        $fileNameSales = $rma->user?->img ?: "N/A";
        $fileNameTechnician = $rma->TName?->img ?: "N/A";
        $fileNameQc = $rma->QName?->img ?: "N/A";

        $signature_sales = 'assetsgambar/file/' . $fileNameSales;
        $signature_technician = 'assetsgambar/file/' . $fileNameTechnician;
        $signature_qc = 'assetsgambar/file/' . $fileNameQc;

        $data = [
            'sales_name' => $rma->user?->name ?: "N/A",
            'technician_name' => $rma->TName?->name ?: "N/A",
            'qc_name' => $rma->QName?->name ?: "N/A",
            'signature_sales' => $signature_sales,
            'signature_technician' => $signature_technician,
            'signature_qc' => $signature_qc,
        ];
        return view('rma.pdf.rma', $data);
    }

}
