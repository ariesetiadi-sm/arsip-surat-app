@extends('layout.template')

@section('content')
    <h1>
        Tambah Pengguna
    </h1>

    <div class="card mt-5">
        <div class="card-header">
            Form Tambah Pengguna
        </div>
        <form action="/pengguna/insert" method="POST">
            @csrf
            <div class="card-body row">
                <div class="col-12 col-md-6">
                    {{-- Input Username --}}
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input name="username" type="text" class="form-control" id="username" required
                            placeholder="Username">
                    </div>
                    {{-- Input Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input name="nama" type="text" class="form-control" id="nama" required
                            placeholder="Nama">
                    </div>
                    {{-- Input email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input name="email" type="email" class="form-control" id="email" required
                            placeholder="Email">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    {{-- Input password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input name="password" type="password" class="form-control" id="password" required
                            placeholder="Password">
                    </div>
                    {{-- Input Jenis Pengguna --}}
                    <div class="form-group mb-3">
                        <label for="jenisPengguna">Jenis Pengguna:</label>
                        <select required name="jenisPengguna" class="form-control" id="jenisPengguna">
                            <option selected hidden>Pilih Jenis Pengguna</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-4 mb-4">Simpan</button>
        </form>
    </div>
@endsection
