<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLogin = auth()->user()->uid;
        $user = User::where("uid", $userLogin)->first();
        $data = [
            "title" => "Account User | IMI - Tracking",
            "user" => $user
        ];
        return view('account_user.index',$data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function datatables(){
        $UidUser = auth()->user()->uid;
        $user = User::where('uid', $UidUser)->get()->toArray();
        return $user;
    }
}
