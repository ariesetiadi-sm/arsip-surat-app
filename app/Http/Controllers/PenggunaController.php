<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['pengguna'] = Pengguna::all()->reverse();
        return view('pengguna.index', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengguna';
        $data['pengguna'] = Pengguna::find($id);
        return view('pengguna.detail', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pengguna';
        return view('pengguna.create', $data);
    }

    public function insert(Request $request)
    {
        // Ambil data dari form insert
        $username = $request->username;
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $jenisPengguna = $request->jenisPengguna;

        // Insert data ke database
        Pengguna::create([
            'username' => $username,
            'nama' => $nama,
            'email' => $email,
            'password' => Hash::make($password),
            'jenis_pengguna' => $jenisPengguna,
            'photo' => 'default.png',
            'dibuat_pada' => now()
        ]);

        return redirect()->to('/pengguna')->with('success', 'Berhasil menambah data pengguna baru.');
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Pengguna';
        $data['pengguna'] = Pengguna::find($id);
        return view('pengguna.edit', $data);
    }

    public function update(Request $request)
    {
        // Ambil data dari form ubah pengguna
        $id = $request->id;
        $nama = $request->nama;
        $email = $request->email;
        $jenisPengguna = $request->jenisPengguna;
        $password = $request->password;

        // Ubah data pengguna
        $pengguna = Pengguna::find($id);
        $pengguna->update([
            'nama' => $nama,
            'email' => $email,
            'jenis_pengguna' => $jenisPengguna,
        ]);

        // Ubah password jika ada
        if ($password) {
            $pengguna->update(['password' => Hash::make($password)]);
        }

        // Redirect ke halaman pengguna kembali
        return redirect()->to('/pengguna')->with('success', 'Berhasil mengubah data pengguna.');
    }

    public function delete($id)
    {
        // Cari data pengguna
        $pengguna = Pengguna::find($id);

        // Hapus data pengguna jika ada
        if (!$pengguna) {
            return back();
        }
        $pengguna->delete();

        // Kembali ke halaman utama pengguna
        return back()->with('success', 'Berhasil menghapus data pengguna.');
    }

    // Tampilkan halaman profile
    public function profile()
    {
        // Siapkan data untuk halaman profile
        $data['title'] = 'Profile';
        $data['pengguna'] = auth()->user();

        return view('profile', $data);
    }

    // Ubah data profile
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

    // Ubah foto profile
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
