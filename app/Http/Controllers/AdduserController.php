<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addsignature;

class AdduserController extends Controller
{
    public function index()
    {
        
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
