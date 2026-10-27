@extends('layouts.admin')

@section('title', 'Data Pengalaman Kerja')
@section('page-title', 'Kelola Pengalaman Kerja (Tabel: pengalaman)')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3">
    <div class="d-block mb-2 mb-md-0">
        <h2 class="h4 mb-0 fw-bold">Pengalaman Kerja & Organisasi</h2>
        <p class="text-muted small mb-0">Tabel CRUD ke-3: <span class="badge bg-primary">pengalaman</span> (Memenuhi total 3 tabel CRUD)</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('pengalaman.create') }}" class="btn btn-sm btn-primary d-inline-flex align-items-center">
            <i class="bi bi-plus-circle me-2"></i> Tambah Pengalaman
        </a>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-header bg-white py-3">
        <form action="{{ route('pengalaman.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Cari posisi atau nama perusahaan..." value="{{ request('search') }}">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('pengalaman.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </div>
            <div class="col-md-7 text-md-end">
                <span class="text-muted small">Total: <strong>{{ $pengalamans->total() }}</strong> Pengalaman Kerja</span>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-bottom text-center" style="width: 60px;">No</th>
                        <th class="border-bottom">Posisi / Jabatan</th>
                        <th class="border-bottom">Perusahaan / Instansi</th>
                        <th class="border-bottom">Periode</th>
                        <th class="border-bottom">Biodata Terkait</th>
                        <th class="border-bottom">Deskripsi</th>
                        <th class="border-bottom text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengalamans as $index => $item)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $pengalamans->firstItem() + $index }}</td>
                            <td>
                                <div class="fw-bold text-dark"><i class="bi bi-briefcase-fill me-1 text-primary"></i>{{ $item->posisi }}</div>
                            </td>
                            <td>
                                <span class="fw-semibold text-secondary"><i class="bi bi-buildings me-1"></i>{{ $item->perusahaan }}</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    <i class="bi bi-clock-history me-1"></i>{{ $item->tahun_mulai }} - {{ $item->tahun_selesai }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold text-muted">
                                    <i class="bi bi-person me-1"></i>{{ $item->biodata ? $item->biodata->nama_lengkap : '-' }}
                                </span>
                            </td>
                            <td>
                                <small class="text-muted">{{ Str::limit($item->deskripsi, 60) }}</small>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('pengalaman.edit', $item->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('pengalaman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengalaman kerja ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="bi bi-briefcase fs-2 d-block mb-2"></i>
                                Belum ada riwayat pengalaman kerja yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($pengalamans->hasPages())
        <div class="card-footer bg-white border-top py-3">
            {{ $pengalamans->links() }}
        </div>
    @endif
</div>
@endsection
