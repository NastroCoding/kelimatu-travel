<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'error' => 'Username atau Password tidak sesuai!'
        ]);

    }
}
