@extends('layouts.admin')

@section('title', 'Edit Biodata')
@section('page-title', 'Edit Biodata: ' . $biodata->nama_lengkap)

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-xl-8">
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square text-warning me-2"></i>Form Edit Biodata</h5>
                    <a href="{{ route('biodata.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $biodata->nama_lengkap) }}" required>
                            @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Profesi / Jabatan / Bidang <span class="text-danger">*</span></label>
                            <input type="text" name="profesi" class="form-control @error('profesi') is-invalid @enderror" value="{{ old('profesi', $biodata->profesi) }}" required>
                            @error('profesi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $biodata->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $biodata->telepon) }}" required>
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $biodata->alamat) }}" required>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Ringkasan Diri / Tentang Saya</label>
                            <textarea name="ringkasan" rows="4" class="form-control @error('ringkasan') is-invalid @enderror">{{ old('ringkasan', $biodata->ringkasan) }}</textarea>
                            @error('ringkasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Foto Profil (Peluang Bonus CRUD Foto)</label>
                            
                            @if($biodata->foto)
                                <div class="mb-2 d-flex align-items-center gap-3">
                                    <img src="{{ asset('storage/' . $biodata->foto) }}" alt="Foto Saat Ini" style="height: 70px; width: 70px; object-fit: cover; border-radius: 50%;" class="border p-1">
                                    <span class="text-muted small">Foto saat ini aktif. Unggah foto baru di bawah jika ingin mengganti.</span>
                                </div>
                            @endif

                            <input type="file" name="foto" id="fotoInput" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            <small class="text-muted d-block mt-1">Format: JPG, PNG, WEBP (Maksimal 2MB). Biarkan kosong jika tidak ingin mengubah foto.</small>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- Live Preview Container for new upload -->
                            <div class="mt-3 d-none" id="previewContainer">
                                <span class="form-label d-block text-muted small">Pratinjau Foto Baru:</span>
                                <img id="previewImage" src="" alt="Pratinjau Foto Baru" style="max-height: 140px; border-radius: 8px; border: 1px solid #ddd;" class="p-1">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Perbarui Biodata
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
