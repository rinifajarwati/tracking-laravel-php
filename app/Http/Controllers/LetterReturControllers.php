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
            "title" => "Letter Retur | IMI Tracking",
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
            ];
            $file =  request()->file('file');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public_uploads_letter_retur')->put($fileName, file_get_contents($file));
            $payload['file'] = $fileName;
            LetterRetur::create($payload);
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
    public function update(Request $request, LetterRetur $letterRetur)
    {
        //
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
        $user = auth()->user()->uid;

        return LetterRetur::where('user_uid', $user)->get()->toArray();
    }

    public function approved(string $uid)
    {
        try {
            $input = [
                'status' => 'Approval-Sales',
                'sales_name' => auth()->user()->uid,
                'sales_date' => Carbon::now(),
            ];

            LetterRetur::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Letter Retur']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //apporved warehouse
    public function datatablesWarehouse()
    {
        return LetterRetur::all();
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
            return back()->with(['alertSuccess' => 'Successfully For Approved Retur Letter']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    //marketing
    public function datatablesMarketing()
    {   
        return LetterRetur::all();
    }

    public function approvedMarketing(string $uid)
    {
        try {
            $input=[
                'status' =>'Approval-Marketing',
                'marketing_name' => auth()->user()->uid,
                'marketing_date' => Carbon::now(),
            ];
       
            LetterRetur::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved Letter Retur']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

    public function approvedMarketingPPIC(string $uid)
    {
        try {
            $input=[
                'status' =>'Approval-PPIC-Marketing',
                'ppic_marketing_name' => auth()->user()->uid,
                'ppic_marketing_date' => Carbon::now(),
            ];
       
            LetterRetur::where('uid', $uid)->update($input);
            return back()->with(['alertSuccess' => 'Successfully For Approved file']);
        } catch (Throwable $e) {
            return back()->with(['alertError' => 'Error' . $e->getMessage()]);
        }
    }

      //pdf letter retur
      public function showPdf(string $uid)
      {
          $pdf = LetterRetur::where("uid", $uid)->get();
          
          $data = [
              "title" => "Letter Retur | IMI Tracking",
              "pdf" => $pdf,
          ];
          return view('letter_retur.pdf.letter_retur', $data);
      }
}
