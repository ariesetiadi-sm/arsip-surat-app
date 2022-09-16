@extends('layout.template')

@section('content')
    <div class="container-fluid mt-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            {{-- Profile --}}
            <div class="col-12 col-md-6" style="height: 65vh">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <i class="fa-solid fa-user"></i>
                        <a id="ubah-profile" href="#ubah-profile" title="Ubah Profile">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <center>
                            {{-- Profile Photo --}}
                            <a href="#ubah-photo" type="button" data-bs-toggle="modal" data-bs-target="#ubah-photo-modal">
                                <img width="100px" src="{{ asset('img/profile/') . '/' . $pengguna->photo }}"
                                    alt="Profile Photo" class="mt-3 shadow rounded-circle">
                            </a>

                            {{-- Nama --}}
                            <h3 class="mt-3">{{ $pengguna->nama }}</h3>
                            <hr>

                            {{-- Username --}}
                            <small class="d-block mt-3 text-secondary">Username :</small>
                            <h5 class="">{{ $pengguna->username }}</h5>

                            {{-- Jenis Pengguna --}}
                            <small class="d-block mt-3 text-secondary">Jenis Pengguna :</small>
                            <h5 class="text-capitalize">{{ $pengguna->jenis_pengguna }}</h5>

                            {{-- Email --}}
                            <small class="d-block mt-3 text-secondary">Email :</small>
                            <h5 class="">{{ $pengguna->email }}</h5>
                        </center>
                    </div>
                </div>
            </div>

            {{-- Form Edit Profile --}}
            <div id="ubah-profile-card" class="col-12 col-md-6 d-none" style="height: 65vh">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <span>Ubah Profile</span>
                        <a id="ubah-profile-close" href="#">
                            <i class="fa-solid fa-x"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="/profile/update" method="POST">
                            @csrf
                            {{-- Hidden ID --}}
                            <input name="id" type="hidden" value="{{ $pengguna->id }}">

                            {{-- Ubah Nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama :</label>
                                <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama"
                                    value="{{ $pengguna->nama }}">
                            </div>

                            {{-- Ubah Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input name="email" type="text" class="form-control" id="email" placeholder="Email"
                                    value="{{ $pengguna->email }}">
                            </div>

                            {{-- Ubah password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password (Optional) :</label>
                                <input name="password" type="password" class="form-control" id="password"
                                    placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-5">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Popup untuk mengubah foto profile --}}
    <div class="modal fade" id="ubah-photo-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="ubah-photo-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubah-photo-modal-label">Ubah Foto Profile</h5>
                </div>
                <form id="ubah-photo-form" action="/profile/update-photo" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{ $pengguna->id }}">
                        <center>
                            <img id="ubah-photo-preview" width="100px" src="img/profile/{{ $pengguna->photo }}"
                                alt="Profile Photo" class="mt-3 shadow rounded-circle">
                        </center>

                        @csrf
                        <div class="mt-5 mb-3">
                            <input name="photo" class="form-control" id="photo" type="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="ubah-photo-close" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
