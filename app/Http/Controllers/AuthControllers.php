<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControllers extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Login | HRIS - Medialys"
        ];
        return view('Auth.login.index',  $data);
    }

    public function authentocate(){
        $validator = request()->validate([
            'email'=>'required|email:dns',
            'password'=>'required|min:6'
        ]);

        if(Auth::attempt($validator)){
            request()->session()->regenerate();

            return redirect()->intended('/');
        }
        return back();
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
