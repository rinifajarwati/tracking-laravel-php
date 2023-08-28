<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Helper\HelperController;
use App\Models\WarehouseSn;
use Symfony\Component\Console\Input\Input;

class WarehouseControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getUser = User::where('division_uid', 'sales')->where('position_uid', 'staff')->get()->toArray();
        $data = [
            "title" => "SO Gudang | IMI Tracking",
            "rowsUser" => $getUser,
            "auth" => auth()->user()->position_uid
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
                'sales_name' => request('sales_name'),
                'delivery_notes' => request('delivery_notes'),
                'created_date' => Carbon::now(),
                'status' => 'Created',
            ];
            // dd($payload);

            $file =  request()->file('file');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public_uploads_file')->put($fileName, file_get_contents($file));
            $payload['file'] = $fileName;
            Warehouse::create($payload);

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
    public function show(string $warehouse)
    {
        //
        $warehouseSN = WarehouseSn::where("warehouse_uid", $warehouse)->get();
        $iniWarehouse = Warehouse::where("uid", $warehouse)->get()->toArray();
        $data = [
            "title" =>  "Details SN | IMI-Tracking",
            "warwhouseSN" => $warehouseSN,
            "iniWarehouse" => $iniWarehouse,
        ];
        return view('warehouse.show', $data);
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
    public function update(Request $request, $uid)
    {
        //
        // dd($uid);
        $warehouse = Warehouse::where('uid', $uid)->first();
        $warehousesn = WarehouseSn::where('warehouse_uid', $warehouse->uid)->get()->toArray();
        // dd($warehousesn);
        // dump($payload);

        $datatWarehouse = request()->validate([
            'data.*.serial_number' => 'required',
            'data.*.weight' => 'required',
            'data.*.koli' => 'required',
            'data.*.gdg' => 'required',
            'data.*.kubikasi' => 'required',
        ]);

        $warehouseUid = $datatWarehouse['warehouse_uid'] = $uid;
        $user = auth()->user()->uid;
        // dd($datatWarehouse);    
        // $warehouseUid = $payload['uid'];

        DB::transaction(function () use ($datatWarehouse, $warehouseUid, $user) {
            foreach ($datatWarehouse['data'] as $dataInput) {
                $dataInput['uid'] = (new HelperController)->getUid();
                $dataInput['warehouse_uid'] = $warehouseUid;
                $dataInput['user_uid'] = $user;
                // dump($dataInput);
                WarehouseSn::create($dataInput);
                // return redirect('/warehouse')->with(['alertSuccess' => 'Successfully']);
            }
        });
        return redirect('/warehouse')->with(['alertSuccess' => 'Successfully']);
        // dd("success");
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
        $notFinished = Warehouse::whereNotIn('status', ['Finish'])->get();
        return $notFinished;
        // return Warehouse::all();
        // $user = auth()->user()->uid;
        // return Warehouse::where('user_uid', $user)->get()->toArray();
    }

    public function datatablesSales()
    {

        $auth = auth()->user()->uid;
        $data = Warehouse::where('sales_name', $auth)->where('status', '!=', 'Finish')->get()->toArray();
        return $data;
 
    }

    public function approvedSalesCoor(string $uid)
    {
        try {
            $input = [
                'status' => 'Approved-By',
                'sales_coor_name' => auth()->user()->uid,
                'sales_coor_date' => Carbon::now(),
            ];
            // dd($input);
            Warehouse::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function datatablesPpic()
    {
        $notFinished = Warehouse::whereNotIn('status', ['Finish'])->get();
        return $notFinished;
        // return Warehouse::all();
    }

    public function approved(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-PPIC',
                'ppic_name' => auth()->user()->uid,
                'ppic_date' => Carbon::now(),
            ];
            Warehouse::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file SO Gudang']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function datatablesWarehouse()
    {
        $notFinished = Warehouse::whereNotIn('status', ['Finish'])->get();
        return $notFinished;
        // return Warehouse::all();
    }

    public function approvedWarehouse(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Warehouse',
                'warehouse_name' => auth()->user()->uid,
                'warehouse_date' => Carbon::now(),
            ];
            Warehouse::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file SO Gudang']);
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
            $input = [
                'status' => 'Approval-Logistics',
                'logistics_name' => auth()->user()->uid,
                'logistics_date' => Carbon::now(),
            ];

            Warehouse::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function approvedPpicClose(string $uid)
    {
        try {
            $input = [
                'status' => 'Finish',
                'ppic_finish_name' => auth()->user()->uid,
                'ppic_finish_date' => Carbon::now(),
            ];
            Warehouse::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function datatablesFinish()
    {

        $finish = Warehouse::where('status', 'Finish')->get();
        return $finish;
    }

    public function Finish()
    {

        $data = [
            "title" => "Finish SO Gudang | IMI Tracking",
        ];
        return view('warehouse.finish', $data);
    }

    public function showPdf(Warehouse $warehouse)
    {
        $fileNameCreated = $warehouse->user?->img ?: "N/A";
        $fileNameApproved = $warehouse->SCName?->img ?: "N/A";
        $fileName = $warehouse->PName?->img ?: "N/A";
        $fileNameWarehouse = $warehouse->WName?->img ?: "N/A";
        $fileNameLogistics = $warehouse->LName?->img ?: "N/A";

        $signature_created = 'assetsgambar/file/' . $fileNameCreated;
        $signature_approved = 'assetsgambar/file/' . $fileNameApproved;
        $signature_path = 'assetsgambar/file/' . $fileName;
        $signature_warehouse = 'assetsgambar/file/' . $fileNameWarehouse;
        $signature_logistics = 'assetsgambar/file/' . $fileNameLogistics;

        $description = $warehouse->description;
        $delivery_notes = $warehouse->delivery_notes;
        $data = [
            'ppic_name' => $warehouse->PName?->name ?: "N/A",
            'warehouse_name' => $warehouse->WName?->name ?: "N/A",
            'logistics_name' => $warehouse->LName?->name ?: "N/A",
            'signature_created' => $signature_created,
            'signature_approved' => $signature_approved,
            'signature_path' => $signature_path,
            'signature_warehouse' => $signature_warehouse,
            'signature_logistics' => $signature_logistics,

            'description_warehouse' => $description,
            'delivery_notes_warehouse' => $delivery_notes,
        ];
        return view('warehouse.pdf.so_warehouse', $data);
    }

    public function cancel(string $uid){
        $payload =[
            'status' => 'Cancel'
        ];
        // dd($payload);
        Warehouse::where('uid', $uid)->update($payload);
        return redirect()->back()->with(['alertSuccess' => 'Successfully cancel SO gudang!']);
    }
}
