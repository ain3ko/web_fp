<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
$credentials = $request->validate([ // Validasi input
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi session untuk keamanan

            return redirect()->intended('admin/admin-beranda'); // Redirect ke halaman setelah login
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }
}