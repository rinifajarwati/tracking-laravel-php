<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addsignature;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class addsignaturecontroller extends Controller
{
    public function index()
    {
        $users = addsignature::all();
        $data=[
            "title" =>"Warehouse | IMI Tracking",
            "users" => $users
            
        ];
        return view('signatureuser.index', $data);
    }

    public function show() {
        {
            
            // Mengambil seluruh data user dari database

            $users = addsignature::all();
            $data = [
                "title" => "show data",
                "users" => $users
            ];
        
            // Tampilkan data user dalam view
            return view('signatureuser.index', $data);
            
        }
    }

    public function uploadPDF()
    {
            $user = User::find(Auth::id());
            if (request()->hasFile('img')) {
                $file = request()->file('img');
                $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
                Storage::disk('public_uploads_img')->put($fileName, file_get_contents($file));
                $user->img = $fileName;
            }
        $user->save();
    
        return redirect()->back()->with('success', 'Gambar berhasil diupdate!');
    }
}
