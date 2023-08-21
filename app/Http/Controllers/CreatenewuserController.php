<?php

namespace App\Http\Controllers;

use App\Models\Addsignature;
use App\Models\Position;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\User;
use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Helper\HelperController;
use Illuminate\Support\Str;

class CreatenewuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posisition= Position::all(); 
        $devision = Division::all();
        // dd($posisition);
        $data = user::all();
        $data = [
            "title" => "Create User | IMI - Tracking",
            "position" => $posisition,
            "devision" => $devision
        ];   
        return view('create-user.index',$data);
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
        try {
            $uid = (new HelperController)->getUid();

            $payload = [
                'uid' => $uid,
                'name' => request('name'),
                'email' => request('email'),
                'password' => request('password'),
                'position_uid' => request('position_uid'),
                'division_uid' => request('division_uid'),
                'img' => request('img'),
            ];
            $file =  request()->file('img');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public_uploads_img')->put($fileName, file_get_contents($file));
            $payload['img'] = $fileName;
            User::create($payload);
            return back()->with(['alertSuccess' => 'Successfully create account!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return back()->with(['alertError' => 'account already Registered!']);
            }
            return back()->with(['alertError' => 'Failed to add new account!']);
        };
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
    //     $user = User::find(Auth::id());
    //     if (request()->hasFile('img')) {
    //         $file = request()->file('img');
    //         $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
    //         Storage::disk('public_uploads_img')->put($fileName, file_get_contents($file));
    //         $user->img = $fileName;
    //     }
    // $user->save();

    // return redirect()->back()->with('success', 'Gambar berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        
    }

    public function datatables(){
        $data = User::all();
        return $data;
    }
}
