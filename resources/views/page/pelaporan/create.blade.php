@extends('layouts.app')
@push('styles')
    @vite(['resources/css/page-css/form_prlaporan.css'])
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
            <form id="reportForm" novalidate>
                <div class="mb-3">
                    <label for="namaPelapor" class="form-label fw-semibold">NAMA PELAPOR <span class="text-danger">*</span></label>
                    <div class="input-group shadow-sm">
                        <input type="text" class="form-control border-end-0" id="namaPelapor"
                          placeholder="Masukkan Nama Lengkap Anda" required />
                        <span class="input-group-text bg-white border-start-0">
                          <i class="bi bi-person-fill text-muted"></i>
                        </span>
                      </div>    
                </div>
                      

                <div class="mb-3">
                    <label for="nomorTelepon" class="form-label fw-semibold">NOMOR TELEPON <span class="text-danger">*</span></label>
                    <div class="input-group shadow-sm">       
                        <input type="text" class="form-control border-end-0" id="nomorTelepon"    
                         placeholder="08xxxxxxxxxx" required />
                        <span class="input-group-text bg-white border-start-0">
                            <i class="bi bi-telephone-fill text-muted"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">EMAIL <span class="text-danger">*</span></label>
                    <div class="input-group shadow-sm">
                       
                        <input type="email" class="form-control border-end-0" id="email"    
                         placeholder="email@gmail.com" required /> 
                        <span class="input-group-text bg-white border-start-0 ">
                            <i class="bi bi-envelope-fill text-muted"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lokasiKejadian" class="form-label fw-semibold">LOKASI KEJADIAN <span class="text-danger">*</span></label>
                        <div class="input-group shadow-sm">
                        
                            <input type="text" class="form-control  border-start-0" id="lokasiKejadian"     
                            placeholder="Contoh: Jl. Sudirman No. 123, Bandung Wetan" required />   
                            <span class="input-group-text bg-white border-start-0">
                                <i class="bi bi-geo-alt-fill text-muted"></i>
                            </span>
                        </div>
                </div>

                <div class="mb-3">
                    <label for="kecamatan" class="form-label fw-semibold">KECAMATAN <span class="text-danger">*</span></label>
                    <select class="form-select shadow-sm" id="kecamatan" required>
                        <option value="" disabled selected>Pilih Kecamatan</option>
                        <option value="bandung-wetan">Bandung Wetan</option>
                        <option value="coblong">Coblong</option>
                        <option value="lengkong">Lengkong</option>
                        <option value="sumur-bandung">Sumur Bandung</option>
                        <option value="sukajadi">Sukajadi</option>
                        <option value="cidadap">Cidadap</option>
                        <option value="cicendo">Cicendo</option>
                        <option value="sukasari">Sukasari</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggalWaktu" class="form-label fw-semibold">TANGGAL & WAKTU <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control shadow-sm rounded-pill" id="tanggalWaktu" required />
                </div>

                <div class="mb-3">
                    <label for="jenisSampah" class="form-label fw-semibold">JENIS SAMPAH <span class="text-danger">*</span></label>
                    <select class="form-select shadow-sm" id="jenisSampah" required>
                        <option value="" disabled selected>Pilih Jenis Sampah</option>
                        <option value="organik">Sampah Organik</option>
                        <option value="plastik">Sampah Plastik</option>
                        <option value="elektronik">Sampah Elektronik</option>
                        <option value="kertas">Sampah Kertas</option>
                        <option value="b3">Sampah B3 (Bahan Berbahaya dan Beracun)</option>
                        <option value="kaca">Sampah Kaca</option>
                        <option value="logam">Sampah Logam</option>
                        <option value="tekstil">Sampah Tekstil</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsiKejadian" class="form-label fw-semibold">DESKRIPSI KEJADIAN <span class="text-danger">*</span></label>
                    <textarea class="form-control shadow-sm" id="deskripsiKejadian" rows="4" placeholder="Jelaskan secara detail kondisi sampah, perkiraan volume, dampak yang ditimbulkan, dan informasi penting lainnya.." required></textarea>
                </div>  

                <div class="mb-4">
                    <label for="fotoBukti" class="form-label fw-semibold">
                        FOTO BUKTI <span class="text-danger">*</span>
                    </label>
                
                    <div class="dropzone border rounded-3 d-flex flex-column justify-content-center align-items-center px-3 py-4 text-center text-secondary shadow-sm"
                        id="dropzone" tabindex="0" role="button">
                
                        <!-- Ikon Upload -->
                        <i id="iconUpload" class="bi bi-upload" style="font-size: 2rem;"></i>
                
                        <!-- Placeholder -->
                        <span id="fotoPlaceholder" class="mt-2 fw-semibold">Klik atau seret foto ke sini</span>
                        <small id="formatInfo" class="text-muted mb-2">Format: JPG, PNG, WebP (Maks 5MB per file)</small>
                
                        <!-- Preview Gambar -->
                        <div id="previewContainer" class="d-flex flex-wrap justify-content-center gap-2 mt-2"></div>
                
                        <!-- Input File (disembunyikan) -->
                        <input type="file" accept=".jpg,.jpeg,.png,.webp" multiple class="d-none" id="fotoBukti" required />
                    </div>
                </div>
                
                <!-- Script -->
                <script>
                    const dropzone = document.getElementById("dropzone");
                    const inputFoto = document.getElementById("fotoBukti");
                    const previewContainer = document.getElementById("previewContainer");
                    const placeholderText = document.getElementById("fotoPlaceholder");
                    const formatInfo = document.getElementById("formatInfo");
                    const iconUpload = document.getElementById("iconUpload");
                
                    // Trigger input saat dropzone diklik
                    dropzone.addEventListener("click", function () {
                        inputFoto.click();
                    });
                
                    // Preview gambar dan sembunyikan elemen-elemen placeholder
                    inputFoto.addEventListener("change", function (e) {
                        previewContainer.innerHTML = ""; // Bersihkan preview sebelumnya
                
                        if (e.target.files.length > 0) {
                            iconUpload.style.display = "none";
                            placeholderText.style.display = "none";
                            formatInfo.style.display = "none";
                        }
                
                        Array.from(e.target.files).forEach(file => {
                            if (file.type.startsWith("image/")) {
                                const reader = new FileReader();
                                reader.onload = function (event) {
                                    const img = document.createElement("img");
                                    img.src = event.target.result;
                                    img.classList.add("img-thumbnail");
                                    img.style.width = "1100px";              // Lebar penuh sesuai dropzone
                                    img.style.height = "400px";             // Tinggi penuh sesuai dropzone
                                    img.style.objectFit = "cover";         // Supaya gambar tetap proporsional dan menutup
                                    img.style.borderRadius = "12px";       // Radius sesuai dropzone (opsional)
                                    img.style.boxShadow = "0 0 8px rgba(0,0,0,0.1)"; 
                                    previewContainer.appendChild(img);
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    });
                </script>


                <div class="mb-4">
                    <label for="informasiTambahan" class="form-label fw-semibold">INFORMASI TAMBAHAN (OPSIONAL)</label>
                    <textarea class="form-control shadow-sm" id="informasiTambahan" rows="3" placeholder="Informasi tambahan seperti frekuensi kejadian, dugaan pelaku, dll."></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-semibold rounded-pill py-3">
                        KIRIM LAPORAN
                </button>
            </form>
        </div>
    </div>
</div>  
@endsection