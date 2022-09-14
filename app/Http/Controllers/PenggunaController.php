<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function profile()
    {
        // Siapkan data untuk halaman profile
        $data['title'] = 'Profile';
        $data['pengguna'] = auth()->user();

        return view('profile', $data);
    }

    public function updateProfile(Request $request)
    {
        // Ambil data dari form ubah profile
        $id = $request->id;
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;

        // Ubah data profile
        $pengguna = Pengguna::find($id);
        $pengguna->update([
            'nama' => $nama,
            'email' => $email,
        ]);

        // Ubah password jika ada
        if ($password) {
            $pengguna->update(['password' => Hash::make($password)]);
        }

        // Redirect ke halaman profile kembali
        return back()->with('success', 'Berhasil mengubah profile.');
    }

    public function updatePhoto(Request $request)
    {
        $id = $request->id;
        $photo = $request->file('photo');
        $path = 'img/profile/';

        // Upload foto ke local storage
        $photoName = uploadFile($photo, $path);

        // Ubah nama photo di database
        Pengguna::find($id)->update([
            'photo' => $photoName
        ]);

        // Redirect ke halaman profile
        return back()->with('success', 'Berhasil mengubah foto profile.');
    }
}
