<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/styles.css" rel="stylesheet" />

    <title>Daftar | Aplikasi Arsip</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h1 class="mb-5">Daftar Akun | Aplikasi Arsip</h1>
                    <form action="/register" method="POST">
                        @csrf
                        <!-- Input Username -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input name="username" type="text" id="username" class="form-control form-control-lg"
                                placeholder="Masukan username" required value="{{ old('username') }}" />
                        </div>

                        <!-- Input Nama -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="nama">Nama</label>
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input name="nama" type="text" id="nama" class="form-control form-control-lg"
                                placeholder="Masukan nama" required value="{{ old('nama') }}" />
                        </div>

                        <!-- Input Email -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input name="email" type="email" id="email" class="form-control form-control-lg"
                                placeholder="Masukan email" required value="{{ old('email') }}" />
                        </div>

                        <!-- Input Password -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input name="password" type="password" id="password" class="form-control form-control-lg"
                                placeholder="Masukan password" required />
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Sudah punya akun?
                                <a href="/login" class="link-danger">Login</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
