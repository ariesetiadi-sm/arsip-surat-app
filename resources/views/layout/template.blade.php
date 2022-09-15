<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    {{-- Style --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    {{-- Fontawesome Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <title>{{ $title ?? 'Title' }} | Administrator Arsip</title>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Administrator</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Topbar-->
        <ul class="navbar-nav ml-auto ml-md-0 w-100 d-flex justify-content-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- Profile Icon --}}
                    <img width="30px" src="{{ asset('img/profile/') . '/' . auth()->user()->photo }}"
                        alt="Profile Icon" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/profile">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </li>
        </ul>
        {{-- End Topbar --}}
    </nav>

    <div id="layoutSidenav">
        {{-- Sidebar --}}
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        {{-- Sidebar Dashhboard --}}
                        <a class="nav-link" href="/">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Menu</div>
                        {{-- Sidebar Kelola Pengguna --}}
                        <a class="nav-link" href="/pengguna">
                            <div class="sb-nav-link-icon">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            Pengguna
                        </a>

                        {{-- Sidebar Surat Masuk --}}
                        <a class="nav-link" href="/surat-masuk">
                            <div class="sb-nav-link-icon">
                                <i class="fa-regular fa-circle-down"></i>
                            </div>
                            Surat Masuk
                        </a>

                        {{-- Sidebar Surat Masuk --}}
                        <a class="nav-link" href="/surat-keluar">
                            <div class="sb-nav-link-icon">
                                <i class="fa-regular fa-circle-up"></i>
                            </div>
                            Surat Keluar
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Sedang login:</div>
                    {{ auth()->user()->nama }}
                </div>
            </nav>
        </div>
        {{-- End Sidebar --}}

        <div id="layoutSidenav_content">
            {{-- Main Content --}}
            <main>
                <div class="container-fluid px-4 pt-5">
                    @yield('content')
                </div>
            </main>
            {{-- End Main Content --}}

            {{-- Footer --}}
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; Aplikasi Arsip <span id="footer-year"></span>
                        </div>
                    </div>
                </div>
            </footer>
            {{-- End Footer --}}
        </div>
    </div>

    {{-- Javascripts --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

        $('#footer-year').text(new Date().getFullYear());
    </script>
</body>

</html>
