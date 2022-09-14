<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Ambil data dari form login
        $username = $request->username;
        $password = $request->password;
        $rememberMe = isset($request->rememberMe);

        // Proses login
        $result = auth()->attempt([
            'username' => $username,
            'password' => $password
        ], $rememberMe);

        // Cek apakah login berhasil
        if (!$result) {
            return back()->with('failed', 'Username atau password salah.');
        }

        // Redirect ke halaman dashboard
        return redirect()->to('/')->with('welcome', 'Selamat datang, ' . auth()->user()->nama);
    }
}
