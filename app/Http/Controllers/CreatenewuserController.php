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
use App\Models\UserPermission;
use App\Models\Permission;
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
        $permissions = Permission::all();
        // dd($posisition);
        $data = user::all();
        $data = [
            "title" => "Create User | IMI - Tracking",
            "position" => $posisition,
            "devision" => $devision,
            "permissions" => $permissions
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
            // dd($payload);
            $users = User::create($payload);
            // $UserPermission = ['user_uid'];
            $permission = request('permission_id');
            $payloadPermission = [
                'user_uid' => $users->uid,
                'permission_id' => $permission,
            ];
            UserPermission::create($payloadPermission);
            return back()->with(['alertSuccess' => 'Successfully create account!']);
        } catch (Throwable $th) {
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
    public function update(User $user)
    {
        try {
            if (request()->hasFile('img')) {
                $img = request()->file('img');
                $fileImg = Str::random(40) . '.' . $img->getClientOriginalExtension();
                Storage::disk('public_uploads_img')->put($fileImg, file_get_contents($img));
                $user['img'] = $fileImg;
            }
            $user->update(request()->except('img'));
            return redirect('/create-user')->with(['alertSuccess' => 'Successfully update user data!']);
        } catch (Throwable $th) {
            dd($th);
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/create-user')->with(['alertError' => 'User data already registered!']);
            }
            return redirect('/create-user')->with(['alertError' => 'Failed to update user!']);
        };   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uid)
    {
       
        try {
            User::where('uid', $uid)->delete();
            return redirect('/create-user')->with(['alertSuccess' => 'Successfully deleted user data!']);
        } catch (Throwable $th) {
            if (preg_match("/duplicate/i", $th->getMessage())) {
                return redirect('/create-user')->with(['alertError' => 'User data already registered!']);
            }
            return redirect('/create-user')->with(['alertError' => 'Failed to deleted user!']);
        };   
    }

    public function datatables(){
        $data = User::all();
        return $data;
    }
}
