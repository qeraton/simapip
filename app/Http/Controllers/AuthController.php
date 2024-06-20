<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\{
    User,
    Pegawai
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Login Berhasil!');
        }

        return redirect()->route('login')->with('error', 'Email / Password Anda Salah');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/')->withSuccess('Anda Telah LogOut');
    }
}
