@extends('layouts.admin')

@section('title', 'Tambah Pengalaman Kerja')
@section('page-title', 'Tambah Pengalaman Kerja')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-xl-8">
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-briefcase-fill text-primary me-2"></i>Form Tambah Pengalaman Kerja</h5>
                    <a href="{{ route('pengalaman.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('pengalaman.store') }}" method="POST">
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

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Posisi / Jabatan / Peran <span class="text-danger">*</span></label>
                            <input type="text" name="posisi" class="form-control @error('posisi') is-invalid @enderror" value="{{ old('posisi') }}" required placeholder="Contoh: Web Developer Intern">
                            @error('posisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Perusahaan / Organisasi <span class="text-danger">*</span></label>
                            <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" value="{{ old('perusahaan') }}" required placeholder="Contoh: PT Digital Inovasi">
                            @error('perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tahun Mulai <span class="text-danger">*</span></label>
                            <input type="text" name="tahun_mulai" class="form-control @error('tahun_mulai') is-invalid @enderror" value="{{ old('tahun_mulai') }}" required placeholder="Contoh: 2025">
                            @error('tahun_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tahun Selesai <span class="text-danger">*</span></label>
                            <input type="text" name="tahun_selesai" class="form-control @error('tahun_selesai') is-invalid @enderror" value="{{ old('tahun_selesai') }}" required placeholder="2026 / Sekarang">
                            @error('tahun_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Deskripsi Pekerjaan / Tanggung Jawab</label>
                            <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Jelaskan peran, tanggung jawab, tools, atau proyek yang dikerjakan...">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('pengalaman.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Pengalaman Kerja
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
