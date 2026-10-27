@extends('layouts.admin')

@section('title', 'Tambah Riwayat Pendidikan')
@section('page-title', 'Tambah Riwayat Pendidikan')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-xl-8">
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-mortarboard-fill text-success me-2"></i>Form Tambah Riwayat Pendidikan</h5>
                    <a href="{{ route('pendidikan.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('pendidikan.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">Pilih Pemilik Biodata <span class="text-danger">*</span></label>
                            <select name="biodata_id" class="form-select @error('biodata_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Biodata --</option>
                                @foreach($biodatas as $bio)
                                    <option value="{{ $bio->id }}" {{ old('biodata_id') == $bio->id ? 'selected' : '' }}>
                                        {{ $bio->nama_lengkap }} ({{ $bio->profesi }})
                                    </option>
                                @endforeach
                            </select>
                            @error('biodata_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <label class="form-label fw-bold">Nama Institusi / Universitas / Sekolah <span class="text-danger">*</span></label>
                            <input type="text" name="nama_institusi" class="form-control @error('nama_institusi') is-invalid @enderror" value="{{ old('nama_institusi') }}" required placeholder="Contoh: Politeknik Caltex Riau">
                            @error('nama_institusi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Jenjang <span class="text-danger">*</span></label>
                            <select name="jenjang" class="form-select @error('jenjang') is-invalid @enderror" required>
                                <option value="">-- Jenjang --</option>
                                <option value="SMA/SMK" {{ old('jenjang') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                <option value="D3" {{ old('jenjang') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="D4" {{ old('jenjang') == 'D4' ? 'selected' : '' }}>D4</option>
                                <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('jenjang') == 'S2' ? 'selected' : '' }}>S2</option>
                            </select>
                            @error('jenjang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jurusan / Program Studi <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" required placeholder="Contoh: Teknik Informatika">
                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bold">Tahun Masuk <span class="text-danger">*</span></label>
                            <input type="text" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" value="{{ old('tahun_masuk') }}" required placeholder="Contoh: 2024">
                            @error('tahun_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bold">Tahun Lulus <span class="text-danger">*</span></label>
                            <input type="text" name="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ old('tahun_lulus') }}" required placeholder="2028 / Sekarang">
                            @error('tahun_lulus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Deskripsi Tambahan / Capaian</label>
                            <textarea name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Contoh: IPK 3.85, aktif organisasi himpunan, fokus riset pengembangan web.">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save me-1"></i> Simpan Riwayat Pendidikan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
