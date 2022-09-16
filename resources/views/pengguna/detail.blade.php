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
                    <div class="card-header d-flex justify-content-end">
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
