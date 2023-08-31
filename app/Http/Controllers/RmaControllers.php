<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Rma;
use App\Models\User;
use Illuminate\Support\Str;
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
        $getUser = User::where('division_uid', 'technician')->where('position_uid', 'staff')->get()->toArray();
        $data = [
            "title" => "Surat Perintah Kerja | IMI Tracking",
            "getUser" => $getUser,
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
                'no_sn' => request('no_sn'),
                'description' => request('description'),
                'kerusakan' => request('kerusakan'),
                'perbaikkan' => request('perbaikkan'),
                'name_teknisi' => request('name_teknisi'),
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
            return back()->with(['alertSuccess' => 'Successfully create Surat Perintah Kerja!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return back()->with(['alertError' => 'Surat Perintah Kerja already Registered!']);
            }
            return back()->with(['alertError' => 'Failed to add new Surat Perintah Kerja!']);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $rma)
    {

        //
        $rma = Rma::where("uid", $rma)->get()->toArray();
        $data = [
            "title" =>  "Details SN | IMI-Tracking",
            "rma" => $rma,
        ];
        // dd($rma);
        return view('rma.show', $data);
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
    public function update(Rma $rma)
    {
        //
        try {
            $rma->update(request()->all());
            return redirect('/rma')->with(['alertSuccess' => 'Successfully updated Surat Perintah Kerja!']);
        } catch (Throwable $th) {
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/rma')->with(['alertError' => 'Surat Perintah Kerja data already registered!']);
            }
            return redirect('/rma')->with(['alertError' => 'Failed to updated Surat Perintah Kerja!']);
        };
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
        $notFinished = rma::whereNotIn('status', ['Finish'])->get();
        return $notFinished;
    }

    //approved technician
    public function datatablesTechnician()
    {
        $auth = auth()->user()->uid;
        $data = rma::where('name_teknisi', $auth)->where('status', '!=', 'Finish')->get()->toArray();
        return $data;
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
            return back()->with(['alertSuccess' => 'Successfully For Approved file Surat Perintah Kerja']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //Approved Qc
    public function datatablesQc()
    {
        $notFinished = rma::whereNotIn('status', ['Finish'])->get();
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

            Rma::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file Surat Perintah Kerja']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }


    public function approvedFinish(string $uid)
    {
        try {
            $input = [
                'status' => 'Finish',
                'admintech_finish_name' => auth()->user()->uid,
                'admintech_finish_date' => Carbon::now(),
            ];

            Rma::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file Surat Perintah Kerja']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function datatablesFinish()
    {

        $finish = Rma::where('status', 'Finish')->get();
        return $finish;
    }

    public function Finish()
    {

        $data = [
            "title" => "Finish Surat Perintah Kerja | IMI Tracking",
        ];
        return view('rma.finish', $data);
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
