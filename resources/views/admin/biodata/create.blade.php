@extends('layouts.admin')

@section('title', 'Tambah Biodata Baru')
@section('page-title', 'Tambah Biodata (Biodata_1192)')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-xl-8">
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-person-plus-fill text-primary me-2"></i>Form Tambah Biodata</h5>
                    <a href="{{ route('biodata.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" required placeholder="Contoh: Syafiqah">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Profesi / Jabatan / Bidang <span class="text-danger">*</span></label>
                            <input type="text" name="profesi" class="form-control @error('profesi') is-invalid @enderror" value="{{ old('profesi') }}" required placeholder="Contoh: Web Developer & UI Designer">
                            @error('profesi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="contoh@mahasiswa.pcr.ac.id">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}" required placeholder="08xxxxxxxxxx">
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required placeholder="Kota, Provinsi (contoh: Pekanbaru, Riau)">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Ringkasan Diri / Tentang Saya</label>
                            <textarea name="ringkasan" rows="4" class="form-control @error('ringkasan') is-invalid @enderror" placeholder="Ceritakan profil singkat, minat, keahlian utama...">{{ old('ringkasan') }}</textarea>
                            @error('ringkasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Foto Profil (Peluang Bonus CRUD Foto)</label>
                            <input type="file" name="foto" id="fotoInput" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            <small class="text-muted d-block mt-1">Format: JPG, PNG, WEBP (Maksimal 2MB).</small>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- Preview Container -->
                            <div class="mt-3 d-none" id="previewContainer">
                                <span class="form-label d-block text-muted small">Pratinjau Foto:</span>
                                <img id="previewImage" src="" alt="Pratinjau Foto" style="max-height: 140px; border-radius: 8px; border: 1px solid #ddd;" class="p-1">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Biodata
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('fotoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('previewImage').src = event.target.result;
                document.getElementById('previewContainer').classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('previewContainer').classList.add('d-none');
        }
    });
</script>
@endpush
