@extends('layouts.admin')

@section('title', 'Data Riwayat Pendidikan')
@section('page-title', 'Kelola Riwayat Pendidikan (Tabel: pendidikan)')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3">
    <div class="d-block mb-2 mb-md-0">
        <h2 class="h4 mb-0 fw-bold">Riwayat Pendidikan</h2>
        <p class="text-muted small mb-0">Tabel CRUD ke-2: <span class="badge bg-success">pendidikan</span> (Peluang bonus tabel > 1)</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('pendidikan.create') }}" class="btn btn-sm btn-success d-inline-flex align-items-center">
            <i class="bi bi-plus-circle me-2"></i> Tambah Pendidikan
        </a>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-header bg-white py-3">
        <form action="{{ route('pendidikan.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Cari nama institusi, jurusan, jenjang..." value="{{ request('search') }}">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('pendidikan.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </div>
            <div class="col-md-7 text-md-end">
                <span class="text-muted small">Total: <strong>{{ $pendidikans->total() }}</strong> Riwayat Pendidikan</span>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-bottom text-center" style="width: 60px;">No</th>
                        <th class="border-bottom">Institusi / Kampus</th>
                        <th class="border-bottom text-center" style="width: 100px;">Jenjang</th>
                        <th class="border-bottom">Jurusan</th>
                        <th class="border-bottom">Periode</th>
                        <th class="border-bottom">Biodata Terkait</th>
                        <th class="border-bottom text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendidikans as $index => $item)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $pendidikans->firstItem() + $index }}</td>
                            <td>
                                <div class="fw-bold text-dark"><i class="bi bi-building me-1 text-primary"></i>{{ $item->nama_institusi }}</div>
                                @if($item->deskripsi)
                                    <small class="text-muted d-block">{{ Str::limit($item->deskripsi, 50) }}</small>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="badge bg-info text-dark">{{ $item->jenjang }}</span>
                            </td>
                            <td>{{ $item->jurusan }}</td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    <i class="bi bi-calendar-event me-1"></i>{{ $item->tahun_masuk }} - {{ $item->tahun_lulus }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold text-secondary">
                                    <i class="bi bi-person me-1"></i>{{ $item->biodata ? $item->biodata->nama_lengkap : '-' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('pendidikan.edit', $item->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus riwayat pendidikan ini?');">
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
                                <i class="bi bi-mortarboard fs-2 d-block mb-2"></i>
                                Belum ada riwayat pendidikan yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($pendidikans->hasPages())
        <div class="card-footer bg-white border-top py-3">
            {{ $pendidikans->links() }}
        </div>
    @endif
</div>
@endsection
