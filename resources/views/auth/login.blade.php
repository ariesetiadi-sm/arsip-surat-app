<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/styles.css" rel="stylesheet" />

    <title>Login | Aplikasi Arsip</title>
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
                    <h1 class="mb-5">Login | Aplikasi Arsip</h1>

                    {{-- Tampilkan error jika ada --}}
                    @if (session('failed'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failed') }}
                        </div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf
                        <!-- Input Username -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input name="username" type="text" id="username" class="form-control form-control-lg"
                                placeholder="Masukan username" required />
                        </div>

                        <!-- Input Password -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input name="password" type="password" id="password" class="form-control form-control-lg"
                                placeholder="Masukan password" required />
                        </div>

                        {{-- Checkbox Remember-me --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <input name="rememberMe" class="form-check-input me-2" type="checkbox"
                                    id="rememberMe" />
                                <label class="form-check-label" for="rememberMe">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Belum punya akun?
                                <a href="/register" class="link-danger">Daftar</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
