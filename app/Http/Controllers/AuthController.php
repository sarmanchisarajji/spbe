<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        // periksa apakah username dan password required (diisi)
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);

        // dd($credentials);

        // mengecek tipe user yang sedang login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role === "level1") {
                return redirect('/dashboard')->with('success', 'Berhasil login!');
            } elseif (auth()->user()->role === "level2") {
                return redirect('/dashboard')->with('success', 'Berhasil login!');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
