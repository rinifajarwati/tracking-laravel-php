<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Helper\HelperController;
use App\Models\User;

class WarehouseControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            "title" => "Warehouse | IMI Tracking",
        ];
        return view('warehouse.index', $data);
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
                'description' => request('description'),
                'file' => request('file'),
                'created_date' => Carbon::now(),
            ];
            $file =  request()->file('file');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public_uploads_file')->put($fileName, file_get_contents($file));
            $payload['file'] = $fileName;
            Warehouse::create($payload);
            return back()->with(['alertSuccess' => 'Successfully create file!']);
        } catch (Throwable $th) {
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return back()->with(['alertError' => 'file already Registered!']);
            }
            return back()->with(['alertError' => 'Failed to add new file!']);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }

    public function datatables()
    {
        $user = auth()->user()->uid;
        
        return Warehouse::where('user_uid', $user)->get()->toArray();
    }

    public function approved(string $uid)
    {
        try {
            $input=[
                'status' =>'Approval-PPIC',
                'ppic_name' => auth()->user()->uid,
                'ppic_date' => Carbon::now(),
            ];
            // $input = ['status' => 'Approval-PPIC'];
       
            Warehouse::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }
    
    public function datatablesWarehouse()
    {   
        return Warehouse::all();
    }

    public function approvedWarehouse(string $uid)
    {
        try {
            $input=[
                'status' =>'Approval-Warehouse',
                'warehouse_name' => auth()->user()->uid,
                'warehouse_date' => Carbon::now(),
            ];
            Warehouse::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function datatablesLogistics()
    {   
        return Warehouse::all();
    }

    public function approvedLogistics(string $uid)
    {
        try {
            $input=[
                'status' =>'Approval-Logistics',
                'logistics_name' => auth()->user()->uid,
                'logistics_date' => Carbon::now(),
            ];
            // $input = ['status' => 'Approval-PPIC'];
       
            Warehouse::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function showPdf(string $uid)
    {
        $pdf = Warehouse::where("uid", $uid)->get();

        $data = [
            "title" => "Warehouse | IMI Tracking",
            "pdf" => $pdf,
        ];
        return view('warehouse.pdf.so_warehouse', $data);
    }

}
