@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Overview')

@section('content')
<!-- Header Banner Info UTS -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm bg-primary text-white p-4" style="background: linear-gradient(135deg, #1f2937, #374151); border-left: 6px solid #fbbf24 !important;">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div>
                    <span class="badge bg-warning text-dark mb-2 px-3 py-1">UTS Pemrograman Framework (BPF)</span>
                    <h3 class="fw-bold mb-1">Aplikasi Web Curriculum Vitae (CV)</h3>
                    <p class="mb-0 text-gray-300">
                        Mahasiswa: <strong>Syafiqah</strong> | NIM: <strong>301192</strong> | Tabel Utama: <span class="badge bg-dark">Biodata_1192</span>
                    </p>
                </div>
                <div class="mt-3 mt-md-0 d-flex gap-2">
                    <a href="{{ route('cv.show') }}" target="_blank" class="btn btn-warning fw-bold d-inline-flex align-items-center">
                        <i class="bi bi-box-arrow-up-right me-2"></i> Buka Web CV Publik
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3 Stat Cards (3 Tabel CRUD) -->
<div class="row g-3 mb-4">
    <!-- Card 1: Biodata_1192 -->
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-md icon-shape-primary rounded me-4 me-sm-0 bg-primary text-white p-3">
                            <i class="bi bi-person-vcard fs-3"></i>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Tabel 1: Biodata_1192</h2>
                            <h3 class="fw-extrabold mb-1">{{ $totalBiodata }} <small class="fs-6 text-muted">Orang</small></h3>
                        </div>
                        <small class="d-flex align-items-center text-success">
                            <i class="bi bi-check2-circle me-1"></i> CRUD + Upload Foto
                        </small>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('biodata.index') }}" class="small fw-bold text-primary">Lihat Data <i class="bi bi-arrow-right"></i></a>
                    <a href="{{ route('biodata.create') }}" class="btn btn-xs btn-outline-primary">+ Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2: Pendidikan -->
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-md icon-shape-success rounded me-4 me-sm-0 bg-success text-white p-3">
                            <i class="bi bi-mortarboard fs-3"></i>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Tabel 2: Pendidikan</h2>
                            <h3 class="fw-extrabold mb-1">{{ $totalPendidikan }} <small class="fs-6 text-muted">Riwayat</small></h3>
                        </div>
                        <small class="d-flex align-items-center text-success">
                            <i class="bi bi-check2-circle me-1"></i> CRUD Riwayat Studi
                        </small>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('pendidikan.index') }}" class="small fw-bold text-success">Lihat Data <i class="bi bi-arrow-right"></i></a>
                    <a href="{{ route('pendidikan.create') }}" class="btn btn-xs btn-outline-success">+ Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: Pengalaman -->
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-4 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-md icon-shape-info rounded me-4 me-sm-0 bg-info text-white p-3">
                            <i class="bi bi-briefcase fs-3"></i>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Tabel 3: Pengalaman</h2>
                            <h3 class="fw-extrabold mb-1">{{ $totalPengalaman }} <small class="fs-6 text-muted">Riwayat</small></h3>
                        </div>
                        <small class="d-flex align-items-center text-success">
                            <i class="bi bi-check2-circle me-1"></i> CRUD Pengalaman Kerja
                        </small>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('pengalaman.index') }}" class="small fw-bold text-info">Lihat Data <i class="bi bi-arrow-right"></i></a>
                    <a href="{{ route('pengalaman.create') }}" class="btn btn-xs btn-outline-info">+ Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Overview Table: Biodata Terdaftar -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="bi bi-person-lines-fill text-primary me-2"></i>Daftar Biodata CV Aktif</h5>
                <a href="{{ route('biodata.create') }}" class="btn btn-sm btn-primary">+ Tambah Biodata Baru</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-bottom">Foto</th>
                            <th class="border-bottom">Nama Lengkap</th>
                            <th class="border-bottom">Profesi</th>
                            <th class="border-bottom">Email & Telepon</th>
                            <th class="border-bottom text-center">Riwayat Terkait</th>
                            <th class="border-bottom text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestBiodatas as $b)
                            <tr>
                                <td>
                                    @if($b->foto)
                                        <img src="{{ asset('storage/' . $b->foto) }}" alt="{{ $b->nama_lengkap }}" class="img-thumb-preview" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($b->nama_lengkap) }}&background=6366f1&color=fff'">
                                    @else
                                        <div class="img-thumb-preview bg-secondary d-flex align-items-center justify-content-center text-white fw-bold">
                                            {{ strtoupper(substr($b->nama_lengkap, 0, 1)) }}
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $b->nama_lengkap }}</strong></td>
                                <td><span class="badge bg-light text-dark border">{{ $b->profesi }}</span></td>
                                <td>
                                    <div><i class="bi bi-envelope text-muted me-1"></i>{{ $b->email }}</div>
                                    <small><i class="bi bi-telephone text-muted me-1"></i>{{ $b->telepon }}</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success me-1">{{ $b->pendidikans->count() }} Pendidikan</span>
                                    <span class="badge bg-primary">{{ $b->pengalamans->count() }} Pengalaman</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('cv.show', $b->id) }}" target="_blank" class="btn btn-xs btn-outline-info" title="Lihat Web CV">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Lihat CV
                                    </a>
                                    <a href="{{ route('biodata.edit', $b->id) }}" class="btn btn-xs btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Belum ada data biodata.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
