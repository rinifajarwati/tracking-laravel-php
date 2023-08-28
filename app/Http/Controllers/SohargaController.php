<?php

namespace App\Http\Controllers;

use Throwable;
use App\Http\Controllers\Helper\HelperController;
use App\Models\Soharga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SohargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            "title" => "SO Harga | IMI Tracking",
        ];
        return view('soharga.index', $data);
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
                'so_number' => request('so_number'),
                'po_no' => request('po_no'),
                'description' => request('description'),
                'file' => request('file'),
                'created_date' => Carbon::now(),
                'status' => 'Created',
            ];
            $file =  request()->file('file');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public_uploads_file')->put($fileName, file_get_contents($file));
            $payload['file'] = $fileName;
            // dd($payload);
            Soharga::create($payload);
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
    public function show(Soharga $soharga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soharga $soharga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soharga $soharga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soharga $soharga)
    {
        //
    }

    public function datatables()
    {
       return Soharga::all();
    }
    
    public function datatablesAdminsales()
    {
        return Soharga::all();
    }

    public function approvedAdminsalesPrice(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Adminsales',
                'adminsales_name' => auth()->user()->uid,
                'adminsales_date' => Carbon::now(),
            ];

            Soharga::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file Soharga']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //Approved Qc
    public function datatablesSales()
    {
        return Soharga::all();
    }

    public function approvedSalesPrice(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Sales',
                'sales_name' => auth()->user()->uid,
                'sales_date' => Carbon::now(),
            ];
            // dd($input);
            Soharga::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file Soharga']);
        } catch (Throwable $e) {
            dd($e);
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }


    public function showPdf(Soharga $soharga)
    {
        $fileNameSales = $soharga->user?->img ?: "N/A";
        $fileNameAdminsales = $soharga->AName?->img ?: "N/A";

        $signature_sales = 'assetsgambar/file/' . $fileNameSales;
        $signature_adminsales = 'assetsgambar/file/' . $fileNameAdminsales;

        $data = [
            'sales_name' => $soharga->user?->name ?: "N/A",
            'adminsales_name' => $soharga->AName?->name ?: "N/A",
            'signature_sales' => $signature_sales,
            'signature_adminsales' => $signature_adminsales,
        ];
        return view('soharga.pdf.so_soharga',$data);
    }
}
