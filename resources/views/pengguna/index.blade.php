@extends('layout.template')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>
        Pengguna
        <a href="/pengguna/create" class="btn btn-sm btn-dark d-inline-block ml-2" title="Tambah Pengguna">
            <i class="fa-solid fa-user-plus"></i>
        </a>
    </h1>

    <section id="table-pengguna" class="my-5 card">
        <div class="card-header">
            <i class="fa-solid fa-user"></i>
            Tabel Pengguna
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengguna as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>
                                <img width="40px" src="{{ asset('img/profile/') . '/' . $item->photo }}"
                                    alt="Profile Photo" class="rounded-circle">
                            </td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <span class="text-capitalize">{{ $item->jenis_pengguna }}</span>
                            </td>
                            <td>
                                {{-- Tombol detail pengguna --}}
                                <a href="/pengguna/detail/{{ $item->id }}" class="d-inline-block mx-1"
                                    title="Detail Pengguna">
                                    <i class="fa-solid fa-circle-info text-dark"></i>
                                </a>

                                {{-- Tombol ubah pengguna --}}
                                <a href="/pengguna/edit/{{ $item->id }}" class="d-inline-block mx-1"
                                    title="Ubah Pengguna">
                                    <i class="fa-solid fa-pen text-success"></i>
                                </a>

                                {{-- Tombol hapus pengguna --}}
                                <a href="/pengguna/delete/{{ $item->id }}" class="d-inline-block mx-1"
                                    title="Hapus Pengguna"
                                    onclick="return confirm('Data pengguna akan dihapus dari sistem.')">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
