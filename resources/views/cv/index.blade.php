<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $biodata ? $biodata->nama_lengkap . ' - Curriculum Vitae' : 'Web CV Portfolio' }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
        }

        .cv-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .cv-header {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: #ffffff;
            padding: 3rem 2.5rem;
            position: relative;
        }

        .profile-img-container {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #ffffff;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
            margin-right: 2rem;
            background-color: #3b82f6;
            flex-shrink: 0;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: #3b82f6;
            border-radius: 2px;
        }

        .timeline {
            position: relative;
            padding-left: 2rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 7px;
            top: 5px;
            bottom: 5px;
            width: 2px;
            background: #e2e8f0;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 1.75rem;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -2rem;
            top: 4px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #3b82f6;
            border: 3px solid #ffffff;
            box-shadow: 0 0 0 2px #93c5fd;
        }

        .contact-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.12);
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.85rem;
            margin-right: 8px;
            margin-bottom: 8px;
            color: #f8fafc;
            text-decoration: none;
            backdrop-filter: blur(5px);
            transition: all 0.2s ease;
        }

        .contact-badge:hover {
            background: rgba(255, 255, 255, 0.22);
            color: #ffffff;
        }

        .floating-bar {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 1050;
            display: flex;
            gap: 12px;
        }

        /* Print styles */
        @media print {
            body {
                background: #ffffff !important;
                color: #000000 !important;
                font-size: 11pt;
            }

            .floating-bar,
            .no-print {
                display: none !important;
            }

            .cv-card {
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
            }

            .cv-header {
                background: #1e293b !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                padding: 1.5rem !important;
            }

            .timeline-dot {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <!-- Top Nav bar for switching & navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-2 no-print shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
                <i class="bi bi-person-badge text-warning me-2 fs-5"></i> Web CV Portfolio
            </a>
            
            <div class="d-flex align-items-center gap-2">
                @if($allBiodata && $allBiodata->count() > 1)
                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-people me-1"></i> Pilih Profil CV
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            @foreach($allBiodata as $ab)
                                <li>
                                    <a class="dropdown-item {{ $biodata && $biodata->id == $ab->id ? 'active' : '' }}" href="{{ route('cv.show', $ab->id) }}">
                                        <strong>{{ $ab->nama_lengkap }}</strong> <small class="d-block text-muted">{{ $ab->profesi }}</small>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <a href="{{ route('dashboard') }}" class="btn btn-warning btn-sm fw-bold">
                    <i class="bi bi-gear-fill me-1"></i> Admin Panel (CRUD)
                </a>
            </div>
        </div>
    </nav>

    <!-- Floating Action Buttons -->
    <div class="floating-bar no-print">
        <button onclick="window.print()" class="btn btn-danger shadow-lg rounded-pill px-4 py-2 fw-bold d-flex align-items-center">
            <i class="bi bi-printer-fill me-2 fs-5"></i> Cetak / Simpan PDF
        </button>
        <a href="{{ route('dashboard') }}" class="btn btn-primary shadow-lg rounded-pill px-4 py-2 fw-bold d-flex align-items-center">
            <i class="bi bi-sliders me-2 fs-5"></i> Kelola Data
        </a>
    </div>

    <!-- Main CV Container -->
    <div class="container py-4 my-2">
        @if(!$biodata)
            <div class="alert alert-warning text-center py-5 shadow-sm">
                <i class="bi bi-exclamation-triangle fs-1 d-block mb-3 text-warning"></i>
                <h4 class="fw-bold">Belum Ada Data Biodata</h4>
                <p class="text-muted">Silakan tambahkan data biodata pertama melalui panel admin.</p>
                <a href="{{ route('biodata.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Data Biodata Sekarang
                </a>
            </div>
        @else
            <div class="cv-card">
                <!-- Header Section -->
                <div class="cv-header">
                    <div class="d-flex flex-column flex-md-row align-items-center text-center text-md-start">
                        <div class="profile-img-container mb-3 mb-md-0">
                            @if($biodata->foto)
                                <img src="{{ asset('storage/' . $biodata->foto) }}" alt="{{ $biodata->nama_lengkap }}" class="profile-img" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($biodata->nama_lengkap) }}&size=200&background=3b82f6&color=fff'">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-white display-4 fw-bold">
                                    {{ strtoupper(substr($biodata->nama_lengkap, 0, 1)) }}
                                </div>
                            @endif
                        </div>

                        <div class="flex-grow-1">
                            <span class="badge bg-warning text-dark px-3 py-1 mb-2 fw-bold" style="letter-spacing: 0.05em;">CURRICULUM VITAE</span>
                            <h1 class="display-6 fw-bold mb-1">{{ $biodata->nama_lengkap }}</h1>
                            <p class="fs-5 text-info mb-3 fw-medium">{{ $biodata->profesi }}</p>

                            <div class="d-flex flex-wrap justify-content-center justify-content-md-start">
                                <a href="mailto:{{ $biodata->email }}" class="contact-badge">
                                    <i class="bi bi-envelope-fill text-warning"></i> {{ $biodata->email }}
                                </a>
                                <a href="tel:{{ $biodata->telepon }}" class="contact-badge">
                                    <i class="bi bi-telephone-fill text-success"></i> {{ $biodata->telepon }}
                                </a>
                                <span class="contact-badge">
                                    <i class="bi bi-geo-alt-fill text-danger"></i> {{ $biodata->alamat }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Body Section -->
                <div class="p-4 p-md-5">
                    <!-- About Me -->
                    @if($biodata->ringkasan)
                        <div class="mb-5">
                            <h2 class="section-title">
                                <i class="bi bi-person-fill text-primary"></i> Tentang Saya
                            </h2>
                            <p class="text-muted leading-relaxed fs-6 mb-0" style="line-height: 1.8;">
                                {{ $biodata->ringkasan }}
                            </p>
                        </div>
                    @endif

                    <div class="row g-5">
                        <!-- Education Column -->
                        <div class="col-12 col-lg-6">
                            <h2 class="section-title">
                                <i class="bi bi-mortarboard-fill text-primary"></i> Riwayat Pendidikan
                            </h2>

                            @if($biodata->pendidikans && $biodata->pendidikans->count() > 0)
                                <div class="timeline">
                                    @foreach($biodata->pendidikans as $edu)
                                        <div class="timeline-item">
                                            <div class="timeline-dot"></div>
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <h5 class="fw-bold mb-0 text-dark">{{ $edu->nama_institusi }}</h5>
                                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                                                    {{ $edu->tahun_masuk }} - {{ $edu->tahun_lulus }}
                                                </span>
                                            </div>
                                            <div class="text-secondary fw-semibold mb-2">
                                                {{ $edu->jenjang }} &bull; {{ $edu->jurusan }}
                                            </div>
                                            @if($edu->deskripsi)
                                                <p class="small text-muted mb-0">{{ $edu->deskripsi }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="p-3 bg-light rounded text-muted small">
                                    <i class="bi bi-info-circle me-1"></i> Belum ada data riwayat pendidikan.
                                </div>
                            @endif
                        </div>

                        <!-- Work Experience Column -->
                        <div class="col-12 col-lg-6">
                            <h2 class="section-title">
                                <i class="bi bi-briefcase-fill text-primary"></i> Pengalaman Kerja
                            </h2>

                            @if($biodata->pengalamans && $biodata->pengalamans->count() > 0)
                                <div class="timeline">
                                    @foreach($biodata->pengalamans as $exp)
                                        <div class="timeline-item">
                                            <div class="timeline-dot" style="background: #10b981; box-shadow: 0 0 0 2px #a7f3d0;"></div>
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <h5 class="fw-bold mb-0 text-dark">{{ $exp->posisi }}</h5>
                                                <span class="badge bg-success-subtle text-success border border-success-subtle">
                                                    {{ $exp->tahun_mulai }} - {{ $exp->tahun_selesai }}
                                                </span>
                                            </div>
                                            <div class="text-secondary fw-semibold mb-2">
                                                <i class="bi bi-buildings me-1"></i> {{ $exp->perusahaan }}
                                            </div>
                                            @if($exp->deskripsi)
                                                <p class="small text-muted mb-0">{{ $exp->deskripsi }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="p-3 bg-light rounded text-muted small">
                                    <i class="bi bi-info-circle me-1"></i> Belum ada data pengalaman kerja.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Footer in CV Card -->
                <div class="px-5 py-3 bg-light border-top d-flex justify-content-between align-items-center text-muted small">
                    <div>
                        UTS BPF &bull; <strong>Syafiqah (NIM: 301192)</strong>
                    </div>
                    <div>
                        Tabel: <code>Biodata_1192</code> &bull; <code>pendidikan</code> &bull; <code>pengalaman</code>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
