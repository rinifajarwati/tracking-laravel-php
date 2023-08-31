<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\LetterRetur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Helper\HelperController;

class LetterReturControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            "title" => "Surat Retur | IMI Tracking",
            "auth_position" => auth()->user()->position_uid,
            "auth_division" => auth()->user()->division_uid,
        ];
        return view('letter_retur.index', $data);
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
                'no_sj' => request('no_sj'),
                'description' => request('description'),
                'file' => request('file'),
                'created_date' => Carbon::now(),
                'status' => 'Created',
            ];
            $file =  request()->file('file');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public_uploads_letter_retur')->put($fileName, file_get_contents($file));
            $payload['file'] = $fileName;
            LetterRetur::create($payload);
            return back()->with(['alertSuccess' => 'Successfully create Surat Retur!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return back()->with(['alertError' => 'Surat retur already Registered!']);
            }
            return back()->with(['alertError' => 'Failed to add new surat retur!']);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterRetur $letterRetur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LetterRetur $letterRetur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LetterRetur $letterRetur)
    {
        //
        try {
            $letterRetur->update(request()->all());
            return redirect('/letter-retur')->with(['alertSuccess' => 'Successfully updated information data!']);
        } catch (Throwable $th) {
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/letter-retur')->with(['alertError' => 'Information data already registered!']);
            }
            return redirect('/letter-retur')->with(['alertError' => 'Failed to updated information !']);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LetterRetur $letterRetur)
    {
        //
    }

    public function datatables()
    {
        $notFinished = LetterRetur::whereNotIn('status', ['Finish'])->get();
        return $notFinished;
    }

    //apporved warehouse
    public function datatablesWarehouse()
    {
        $notFinished = LetterRetur::whereNotIn('status', ['Finish'])->get();
        return $notFinished;
    }

    public function approvedWarehouse(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Warehouse',
                'warehouse_name' => auth()->user()->uid,
                'warehouse_date' => Carbon::now(),
            ];
            // $input = ['status' => 'Approval-PPIC'];

            LetterRetur::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Surat Retur']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //marketing
    public function datatablesMarketing()
    {
        $notFinished = LetterRetur::whereNotIn('status', ['Finish'])->get();
        return $notFinished;
    }

    public function approvedMarketing(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Marketing',
                'marketing_name' => auth()->user()->uid,
                'marketing_date' => Carbon::now(),
            ];

            LetterRetur::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Surat Retur']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function approvedSCM(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-SCM',
                'scm_name' => auth()->user()->uid,
                'scm_date' => Carbon::now(),
            ];

            LetterRetur::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Surat Retur']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function approvedFinish(string $uid)
    {
        try {
            $input = [
                'status' => 'Finish',
                'admin_finish_name' => auth()->user()->uid,
                'admin_finish_date' => Carbon::now(),
            ];

            LetterRetur::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Surat Retur']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function datatablesFinish()
    {
        $finish = LetterRetur::where('status', 'Finish')->get();
        return $finish;
    }

    public function Finish()
    {
        $data = [
            "title" => "Finish Surat Retur | IMI Tracking",
        ];
        return view('letter_retur.finish', $data);
    }

    //pdf letter retur
    public function showPdf(LetterRetur $letterRetur)
    {
        $fileNameSales = $letterRetur->user?->img ?: "N/A";
        $fileNameWarehouse = $letterRetur->WName?->img ?: "N/A";
        $fileNameMarketing = $letterRetur->MName?->img ?: "N/A";
        $fileNamePpicMarketing = $letterRetur->MPName?->img ?: "N/A";
        $signature_sales = 'assetsgambar/file/' . $fileNameSales;
        $signature_warehouse = 'assetsgambar/file/' . $fileNameWarehouse;
        $signature_marketing = 'assetsgambar/file/' . $fileNameMarketing;
        $signature_marketing_ppic = 'assetsgambar/file/' . $fileNamePpicMarketing;

        $data = [
            'sales_name' => $letterRetur->user?->name ?: "N/A",
            'warehouse_name' => $letterRetur->WName?->name ?: "N/A",
            'marketing_name' => $letterRetur->MName?->name ?: "N/A",
            'marketing_ppic_name' => $letterRetur->MPName?->name ?: "N/A",
            'signature_sales' => $signature_sales,
            'signature_warehouse' => $signature_warehouse,
            'signature_marketing' => $signature_marketing,
            'signature_marketing_ppic' =>  $signature_marketing_ppic,
        ];
        return view('letter_retur.pdf.letter_retur', $data);
    }
}
