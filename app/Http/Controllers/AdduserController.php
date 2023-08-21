<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addsignature;
use App\Models\User;

class AdduserController extends Controller
{
    public function index()
    {
        $login = auth()->user()->uid;
        $user = User::where('uid', $login)->get()->toArray();
        // dd($user);
        $data=[
            "title" =>"Newuser | IMI Tracking",
            
        ];
        return view('newuser.index', $data);
    }
    public function datatables()
    {
        return addsignature::all();
    }
}
