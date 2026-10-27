<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Admin Panel CV') - UTS CV Syafiqah (1192)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 4px;
        }
        .sidebar .nav-link.active {
            background-color: #1f2937;
            color: #fbbf24;
            font-weight: 600;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
        }
        .table-responsive {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .badge-nim {
            background: linear-gradient(135deg, #6366f1, #3b82f6);
            color: #fff;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .img-thumb-preview {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #e5e7eb;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Mobile Nav -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="{{ route('dashboard') }}">
            <span class="fw-bold text-white"><i class="bi bi-file-earmark-person me-2"></i>UTS CV - 1192</span>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom border-gray-700">
                <div class="d-flex align-items-center">
                    <div class="avatar-sm me-3 bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-white fw-bold">UTS CV PROJECT</h6>
                        <small class="text-warning">NIM: 301192</small>
                    </div>
                </div>
            </div>

            <ul class="nav flex-column pt-2">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 text-info"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item mt-3 mb-1">
                    <small class="text-uppercase text-gray-400 fw-bold" style="font-size: 0.75rem; letter-spacing: 0.05em;">3 Tabel CRUD</small>
                </li>

                <!-- Tabel 1: Biodata_1192 -->
                <li class="nav-item">
                    <a href="{{ route('biodata.index') }}" class="nav-link {{ request()->routeIs('biodata.*') ? 'active' : '' }}">
                        <i class="bi bi-person-vcard text-warning"></i>
                        <span>Biodata (Biodata_1192)</span>
                    </a>
                </li>

                <!-- Tabel 2: Pendidikan -->
                <li class="nav-item">
                    <a href="{{ route('pendidikan.index') }}" class="nav-link {{ request()->routeIs('pendidikan.*') ? 'active' : '' }}">
                        <i class="bi bi-mortarboard text-success"></i>
                        <span>Riwayat Pendidikan</span>
                    </a>
                </li>

                <!-- Tabel 3: Pengalaman -->
                <li class="nav-item">
                    <a href="{{ route('pengalaman.index') }}" class="nav-link {{ request()->routeIs('pengalaman.*') ? 'active' : '' }}">
                        <i class="bi bi-briefcase text-primary"></i>
                        <span>Pengalaman Kerja</span>
                    </a>
                </li>

                <li class="nav-item mt-3 mb-1">
                    <small class="text-uppercase text-gray-400 fw-bold" style="font-size: 0.75rem; letter-spacing: 0.05em;">Front-End CV</small>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cv.show') }}" target="_blank" class="nav-link text-info">
                        <i class="bi bi-box-arrow-up-right"></i>
                        <span>Lihat Web CV Publik</span>
                    </a>
                </li>
            </ul>

            <div class="mt-4 pt-3 border-top border-gray-700">
                <div class="p-3 bg-gray-700 rounded-3 text-center">
                    <span class="badge-nim mb-2 d-inline-block">Tabel: Biodata_1192</span>
                    <p class="small text-gray-300 mb-0">Total 3 Tabel CRUD + Upload Foto + Modern CV Page</p>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <span class="h5 mb-0 text-gray-800 fw-bold">
                            @yield('page-title', 'Dashboard')
                        </span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('cv.show') }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center">
                            <i class="bi bi-eye me-1"></i> Lihat CV
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle d-flex align-items-center" type="button">
                                <i class="bi bi-person-circle me-1"></i> Syafiqah (1192)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Flash Messages -->
        <div class="container-fluid px-0 mt-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-1"></i> Terjadi kesalahan validasi:</div>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <!-- Page Content -->
        <div class="py-3">
            @yield('content')
        </div>

        <footer class="bg-white rounded shadow p-4 mb-4 mt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0 text-muted">UTS Praktikum Pemrograman Framework &copy; 2026 - <strong>Syafiqah (NIM: 301192)</strong></p>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <span class="badge bg-primary">3 Tabel CRUD</span>
                    <span class="badge bg-success">Upload Foto Profil</span>
                    <span class="badge bg-info text-dark">Export / Cetak CV</span>
                </div>
            </div>
        </footer>
    </main>

    <!-- Core JS -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
