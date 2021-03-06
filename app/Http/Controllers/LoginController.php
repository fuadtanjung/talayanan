<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'login'  => 'required',
            'loginpassword' => 'required',
        ]);

        if(Auth::attempt([ 'email'=> $request->login, 'password' => $request->loginpassword]))
        {
            return redirect()->route('home')->with('success','Selamat datang');
        }
        return redirect()->route('login.index')->with('failed','Username atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
