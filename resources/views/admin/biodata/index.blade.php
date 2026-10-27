@extends('layouts.admin')

@section('title', 'Data Biodata (Biodata_1192)')
@section('page-title', 'Kelola Biodata (Tabel: Biodata_1192)')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3">
    <div class="d-block mb-2 mb-md-0">
        <h2 class="h4 mb-0 fw-bold">Data Biodata Pribadi</h2>
        <p class="text-muted small mb-0">Tabel utama sesuai kriteria: <span class="badge bg-dark">Biodata_1192</span> (Bonus upload foto profil)</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('biodata.create') }}" class="btn btn-sm btn-primary d-inline-flex align-items-center">
            <i class="bi bi-plus-circle me-2"></i> Tambah Biodata
        </a>
    </div>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-header bg-white py-3">
        <form action="{{ route('biodata.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Cari nama, profesi, atau email..." value="{{ request('search') }}">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('biodata.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </div>
            <div class="col-md-7 text-md-end">
                <span class="text-muted small">Total: <strong>{{ $biodatas->total() }}</strong> Data Biodata</span>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-bottom text-center" style="width: 60px;">No</th>
                        <th class="border-bottom" style="width: 90px;">Foto</th>
                        <th class="border-bottom">Nama & Profesi</th>
                        <th class="border-bottom">Kontak</th>
                        <th class="border-bottom">Alamat</th>
                        <th class="border-bottom text-center" style="width: 190px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($biodatas as $index => $item)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $biodatas->firstItem() + $index }}</td>
                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_lengkap }}" class="img-thumb-preview shadow-sm" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($item->nama_lengkap) }}&background=6366f1&color=fff'">
                                @else
                                    <div class="img-thumb-preview bg-secondary d-flex align-items-center justify-content-center text-white fw-bold">
                                        {{ strtoupper(substr($item->nama_lengkap, 0, 1)) }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $item->nama_lengkap }}</div>
                                <small class="text-primary fw-semibold"><i class="bi bi-briefcase me-1"></i>{{ $item->profesi }}</small>
                            </td>
                            <td>
                                <div class="small"><i class="bi bi-envelope text-muted me-1"></i>{{ $item->email }}</div>
                                <div class="small"><i class="bi bi-telephone text-muted me-1"></i>{{ $item->telepon }}</div>
                            </td>
                            <td>
                                <span class="text-muted small">{{ Str::limit($item->alamat, 40) }}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('cv.show', $item->id) }}" target="_blank" class="btn btn-sm btn-outline-info" title="Lihat Web CV">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('biodata.edit', $item->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Biodata">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('biodata.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus biodata {{ $item->nama_lengkap }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Biodata">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                Belum ada data biodata yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($biodatas->hasPages())
        <div class="card-footer bg-white border-top py-3">
            {{ $biodatas->links() }}
        </div>
    @endif
</div>
@endsection
