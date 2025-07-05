@extends('layouts.app')

@push('styles')
    @vite(['resources/css/page-css/form_pelaporan.css'])
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const uploadBox = document.getElementById('uploadBox');
        const fileInput = document.getElementById('fotoBukti');
        const previewContainer = document.getElementById('previewContainer');
        const placeholderContent = document.getElementById('placeholderContent');

        uploadBox.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            previewContainer.innerHTML = '';

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = e => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'preview-image';
                    previewContainer.appendChild(img);

                    // Toggle visibility
                    placeholderContent.classList.add('d-none');
                    previewContainer.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            } else {
                placeholderContent.classList.remove('d-none');
                previewContainer.classList.add('d-none');
            }
        });
    });
</script>
@endpush

@section('content')     

<div class="hero pt-5"> 
    <div class="text-center1 text-center  mb-4 ">
        <div class="icon-wrapper mb-3">
            <i class="bi bi-trash-fill " style="font-size: 35px;"></i>
        </div>
        <h2 class="fw-bold lapor mb-2">Laporan Sampah Ilegal</h2>
        <p class="text-secondary1 mx-auto mb-0">
            Laporkan pembuangan sampah ilegal untuk menjaga kebersihan lingkungan Bandung
        </p>
    </div>
    <div class="d-flex justify-content-center align-items-center min-vh-100 px-3 py-4">
        <div class="report-form-container p-4 pt-5">
            <form action="{{ route('pelaporan.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                
                <!-- Nama Pelapor -->
                <div class="mb-3">
                    <label for="nama_pelapor" class="form-label fw-semibold">NAMA PELAPOR <span class="text-danger">*</span></label>
                    <div class="input-group shadow-sm">
                        <input type="text" 
                            class="form-control border-end-0 @error('nama_pelapor') is-invalid @enderror" 
                            name="nama_pelapor" 
                            id="nama_pelapor" 
                            value="{{ old('nama_pelapor') }}" 
                            placeholder="Masukkan nama lengkap anda"
                            required
                            autofocus>
                        <span class="input-group-text bg-white border-start-0">
                            <i class="bi bi-person-fill text-muted"></i>
                        </span>
                        @error('nama_pelapor')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- No Telpon -->
                <div class="mb-3">
                    <label for="no_telpon" class="form-label fw-semibold">NOMOR TELEPON <span class="text-danger">*</span></label>
                    <div class="input-group shadow-sm">
                        <input type="text" 
                            class="form-control border-end-0 @error('no_telpon') is-invalid @enderror" 
                            name="no_telpon" 
                            id="no_telpon" 
                            value="{{ old('no_telpon') }}" 
                            placeholder="Masukan no telepon anda"
                            required
                            autofocus>
                        <span class="input-group-text bg-white border-start-0">
                            <i class="bi bi-telephone-fill text-muted"></i>
                        </span>
                        @error('no_telpon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">EMAIL <span class="text-danger">*</span></label>
                    <div class="input-group shadow-sm">
                        <input type="email" 
                            class="form-control border-end-0 @error('email') is-invalid @enderror" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}" 
                            placeholder="Masukan email aktif anda"
                            required
                            autofocus>
                        <span class="input-group-text bg-white border-start-0">
                            <i class="bi bi-envelope-fill text-muted"></i>
                        </span>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- LOKASI KEJADIAN -->
                <div class="mb-3">
                    <label for="lokasi_kejadian" class="form-label fw-semibold">LOKASI KEJADIAN <span class="text-danger">*</span></label>
                    <div class="input-group shadow-sm">
                        <input type="text" 
                            class="form-control border-end-0 @error('lokasi_kejadian') is-invalid @enderror" 
                            name="lokasi_kejadian" 
                            id="lokasi_kejadian" 
                            value="{{ old('lokasi_kejadian') }}" 
                            placeholder="Contoh: Jl. Sudirman No. 123, Bandung Wetan"
                            required
                            autofocus>
                        <span class="input-group-text bg-white border-start-0">
                            <i class="bi bi-geo-alt-fill text-muted"></i>
                        </span>
                        @error('lokasi_kejadian')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- KECAMATAN   -->
                <div class="mb-3">
                    <label for="kecamatan" class="form-label fw-semibold">KECAMATAN <span class="text-danger">*</span></label>
                    <div class="input-group shadow-sm">
                    <select class="form-select shadow-sm @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" required>
                        <option value="" disabled selected>Pilih Kecamatan</option>
                        <option value="andir" {{ old('kecamatan') == 'andir' ? 'selected' : '' }}>Andir</option>
                        <option value="antapani" {{ old('kecamatan') == 'antapani' ? 'selected' : '' }}>Antapani</option>
                        <option value="arcamanik" {{ old('kecamatan') == 'arcamanik' ? 'selected' : '' }}>Arcamanik</option>
                        <option value="astanaanyar" {{ old('kecamatan') == 'astanaanyar' ? 'selected' : '' }}>Astanaanyar</option>
                        <option value="babakan_ciparay" {{ old('kecamatan') == 'babakan_ciparay' ? 'selected' : '' }}>Babakan Ciparay</option>
                        <option value="bandung_kidul" {{ old('kecamatan') == 'bandung_kidul' ? 'selected' : '' }}>Bandung Kidul</option>
                        <option value="bandung_kulon" {{ old('kecamatan') == 'bandung_kulon' ? 'selected' : '' }}>Bandung Kulon</option>
                        <option value="bandung_wetan" {{ old('kecamatan') == 'bandung_wetan' ? 'selected' : '' }}>Bandung Wetan</option>
                        <option value="batununggal" {{ old('kecamatan') == 'batununggal' ? 'selected' : '' }}>Batununggal</option>
                        <option value="bojongloa_kaler" {{ old('kecamatan') == 'bojongloa_kaler' ? 'selected' : '' }}>Bojongloa Kaler</option>
                        <option value="bojongloa_kidul" {{ old('kecamatan') == 'bojongloa_kidul' ? 'selected' : '' }}>Bojongloa Kidul</option>
                        <option value="buah_batu" {{ old('kecamatan') == 'buah_batu' ? 'selected' : '' }}>Buah Batu</option>
                        <option value="cibeunying_kaler" {{ old('kecamatan') == 'cibeunying_kaler' ? 'selected' : '' }}>Cibeunying Kaler</option>
                        <option value="cibeunying_kidul" {{ old('kecamatan') == 'cibeunying_kidul' ? 'selected' : '' }}>Cibeunying Kidul</option>
                        <option value="cibiru" {{ old('kecamatan') == 'cibiru' ? 'selected' : '' }}>Cibiru</option>
                        <option value="cicendo" {{ old('kecamatan') == 'cicendo' ? 'selected' : '' }}>Cicendo</option>
                        <option value="cidadap" {{ old('kecamatan') == 'cidadap' ? 'selected' : '' }}>Cidadap</option>
                        <option value="cinambo" {{ old('kecamatan') == 'cinambo' ? 'selected' : '' }}>Cinambo</option>
                        <option value="coblong" {{ old('kecamatan') == 'coblong' ? 'selected' : '' }}>Coblong</option>
                        <option value="gedebage" {{ old('kecamatan') == 'gedebage' ? 'selected' : '' }}>Gedebage</option>
                        <option value="kiaracondong" {{ old('kecamatan') == 'kiaracondong' ? 'selected' : '' }}>Kiaracondong</option>
                        <option value="lengkong" {{ old('kecamatan') == 'lengkong' ? 'selected' : '' }}>Lengkong</option>
                        <option value="mandalajati" {{ old('kecamatan') == 'mandalajati' ? 'selected' : '' }}>Mandalajati</option>
                        <option value="panyileukan" {{ old('kecamatan') == 'panyileukan' ? 'selected' : '' }}>Panyileukan</option>
                        <option value="rancasari" {{ old('kecamatan') == 'rancasari' ? 'selected' : '' }}>Rancasari</option>
                        <option value="regol" {{ old('kecamatan') == 'regol' ? 'selected' : '' }}>Regol</option>
                        <option value="sukajadi" {{ old('kecamatan') == 'sukajadi' ? 'selected' : '' }}>Sukajadi</option>
                        <option value="sukasari" {{ old('kecamatan') == 'sukasari' ? 'selected' : '' }}>Sukasari</option>
                        <option value="sumur_bandung" {{ old('kecamatan') == 'sumur_bandung' ? 'selected' : '' }}>Sumur Bandung</option>
                        <option value="ujungberung" {{ old('kecamatan') == 'ujungberung' ? 'selected' : '' }}>Ujungberung</option>
                    </select>
                    @error('kecamatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- JENIS SAMPAH   -->
                <div class="my-3">
                    <label for="jenis_sampah" class="form-label fw-semibold">JENIS SAMPAH <span class="text-danger">*</span></label>
                    <select class="form-select shadow-sm @error('jenis_sampah') is-invalid @enderror" name="jenis_sampah" id="jenis_sampah" required>
                        <option value="" disabled selected>Pilih Jenis Sampah</option>
                        <option value="organik" {{ old('jenis_sampah') == 'organik' ? 'selected' : '' }}>Sampah Organik</option>
                        <option value="anorganik" {{ old('jenis_sampah') == 'anorganik' ? 'selected' : '' }}>Sampah Anorganik</option>
                        <option value="b3" {{ old('jenis_sampah') == 'b3' ? 'selected' : '' }}>Sampah B3 (Bahan Berbahaya dan Beracun) </option>
                    </select>
                        @error('jenis_sampah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fotoBukti" class="form-label fw-semibold">
                        FOTO BUKTI <span class="text-danger">*</span>
                    </label>

                    <!-- Container Upload -->
                    <div class="upload-box shadow-sm" id="uploadBox" role="button" tabindex="0">
                        <div id="placeholderContent" class="text-center text-secondary">
                            <i class="bi bi-image" style="font-size: 2rem;"></i>
                            <p class="mb-0 mt-2 fw-semibold">Pilih foto di sini</p>
                            <small class="text-muted">Format: JPG, PNG, WebP (Maks 5MB per file)</small>
                        </div>
                        <div id="previewContainer" class="preview-container d-none"></div>
                    </div>

                    <!-- Input file -->
                    <input type="file"
                        name="foto_bukti"
                        id="fotoBukti"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="d-none @error('foto_bukti') is-invalid @enderror"
                        required>

                    @error('foto_bukti')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <!-- INFORMASI TAMBAHAN -->
                <div class="mb-3">
                    <label for="informasi_tambahan" class="form-label fw-semibold">INFORMASI TAMBAHAN <span class="text-danger">*</span></label>
                    <textarea class="form-control shadow-sm @error('informasi_tambahan') is-invalid @enderror" 
                            name="informasi_tambahan"
                            id="informasi_tambahan" 
                            rows="3" 
                            placeholder="Informasi tambahan seperti frekuensi kejadian, dugaan pelaku, dll."
                            required>{{ old('informasi_tambahan') }}</textarea>
                    @error('informasi_tambahan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-semibold rounded-pill py-3">
                        KIRIM LAPORAN
                </button>
            </form>
        </div>
    </div>
</div>  
@endsection