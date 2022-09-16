@extends('layout.template')

@section('content')
    <h1>
        Ubah Pengguna
    </h1>

    <div class="card mt-5">
        <div class="card-header">
            Form Ubah Pengguna
        </div>
        <form action="/pengguna/update/{{ $pengguna->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body row">
                <div class="col-12 col-md-6">
                    {{-- Input Username --}}
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input name="username" type="text" class="form-control" id="username" required
                            placeholder="Username" value="{{ $pengguna->username }}" disabled>
                    </div>
                    {{-- Input Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input name="nama" type="text" class="form-control" id="nama" required placeholder="Nama"
                            value="{{ $pengguna->nama }}">
                    </div>
                    {{-- Input email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input name="email" type="email" class="form-control" id="email" required
                            placeholder="Email" value="{{ $pengguna->email }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    {{-- Input password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Ubah Password (Optional):</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    {{-- Input Jenis Pengguna --}}
                    <div class="form-group mb-3">
                        <label for="jenisPengguna">Jenis Pengguna:</label>
                        <select required name="jenisPengguna" class="form-control" id="jenisPengguna">
                            @if ($pengguna->jenis_pengguna == 'admin')
                                <option selected value="admin">Admin</option>
                                <option value="user">User</option>
                            @else
                                <option value="admin">Admin</option>
                                <option selected value="user">User</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-4 mb-4">Simpan</button>
        </form>
    </div>
@endsection
