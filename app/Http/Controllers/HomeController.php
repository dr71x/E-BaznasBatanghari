<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('main.login');
    }

    public function ProsesLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $name = Auth::user()->name;
            return redirect()->intended('dashboard')->with('success', "Selamat Datang $name");
        } else {
            return back()->with([
                'errorse' => 'Silahkan Cek Kembali Email Dan Password Anda',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
