<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
            return view('login');

    }
    public function authenticate(Request $request)
    {
        //Validasi input login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        //Coba authentication user
        $credentials = $request-> only('username', 'password');
        if (auth::attempt($credentials)) {
            //Jika login berhqsil, arahkan ke halaman daashboard atau halaman utama
            return redirect()->intended('/admin/beranda');
        }

        //Jika login gagal, kembalikan ke halaman login dengan pesasn error
        return back()->withErrors([
            'username' => 'Username atau password salah'
        ]);
    }
}
