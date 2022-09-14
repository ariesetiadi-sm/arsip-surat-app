<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi form pendaftaran
        $request->validate([
            'username' => 'required|unique:pengguna,username|min:8',
            'password' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:pengguna,email'
        ]);

        // Ambil data pengguna pada form daftar
        $username = $request->username;
        $password = $request->password;
        $nama = $request->nama;
        $email = $request->email;

        // Insert data pengguna ke database
        Pengguna::create([
            'username' => $username,
            'password' => Hash::make($password),
            'nama' => $nama,
            'email' => $email,
            'jenis_pengguna' => 'user',
            'photo' => 'default.png',
            'dibuat_pada' => now()
        ]);

        // Login pengguna yang baru daftar
        auth()->attempt($request->only(['username', 'password']));

        // Redirect ke halaman dashboard
        return redirect()->to('/');
    }
}
