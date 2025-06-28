@extends('layouts.app')

@section('content')

<div class="jumbotron d-flex align-items-center min-vh-100 bg-white">   

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-5">
                <h1 class="big-title e-bold text-04709A  "style="color: #04709A;">SBB Artikel</h1><br>
                <p class="subtitle fs-3" style="color: #04709A;">Ialah wadah berbagi informasi dalam berbagai bentuk seputar isu persampahan.</p>
                <p class="lead text-center text-md-start">
                </p>
            </div>  
            <div class="col-md-6 col-lg-5 text-end">
                <div class="jumbtron_img">
                    <img src="{{ asset('images/jumbotron5.JPG' ) }}" alt="jumbotron" width="400">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center py-5 bg-white">
    <h1 class="big-title display-6 e-bold tx-info text-#04709A" style="color: #04709A;">Informasi Terbaru</h1>
</div>

<div class="content-artikel">
    <div class="grid-artikel">
        <!-- Kartu 1 -->
        <div class="card-artikel">
            <div class="card-1 position-relative">
                <img src="{{ asset('images/jumbotron7.JPG') }}" alt class="card-img" />
                <div class="blog">                
                   <h1 class="position-absolute text-white m-0 px-2 py-1" style="bottom: 0; left: 9px; background-color: #99D45C;">Blog</h1>
                </div>
            </div>
            <div class="card-body">
                <p class="date">| 06 Mei 2025</p><br>
                <h3>Berita Terbaru Tentang Sampah Hari Ini 22 Juni 2025 ...</h3><br>
                <p class="excerpt">
                    Sampah Makan Bergizi Gratis Jadi Masalah Baru di Sekolah · Pemkot Yogyakarta Tambah Alat Penghadang Sampah di Sungai · Gubernur Jakarta Pramono Sebut Sampah ...
                </p>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <div class="ms-2">
                        <i class="bi bi-share"></i>
                    </div>
                    <div>
                        <a href="#" class="btn text-white" style="background-color: #99D45C;">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu 2 -->
        <div class="card-artikel">
            <div class="card-1 position-relative">
                <img src="{{ asset('images/jumbotron8.jpg') }}" alt class="card-img" />
                <div class="blog">                
                    <h1 class="position-absolute text-white m-0 px-2 py-1" style="bottom: 0; left: 9px; background-color: #99D45C;">Blog</h1>
                 </div>
            </div>
            <div class="card-body">
                <p class="date">| 06 Mei 2025</p><br>
                <h3>Tingkat Pengelolaan sampah di Indonesia baru capai 10 ...</h3><br>
                <p class="excerpt">
                    Pengelolaan sampah di berbagai wilayah Indonesia baru mencapai sekitar 10 persen berdasarkan hasil verifikasi lapangan oleh Kementerian ...
                </p>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <div class="ms-2">
                        <i class="bi bi-share"></i>
                    </div>
                    <div>
                        <a href="#" class="btn text-white" style="background-color: #99D45C;">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center py-1">
    <h1 class="big-title display-6 e-bold tx-info text-#04709A mb-5 mt-5" style="color: #04709A;">Referensi Informasi</h1>
</div>

<div class="jumbotron d-flex align-items-center">
    <div class="container2">
        <div class="row align-items-stretch g-4">    
            <!-- Kolom Kiri -->
            <div class="col-lg-7">
                <div class="border-0 overflow-hidden rounded">
                    <div class="position-relative" style="height: 400px; width:1500px;">
                        <img src="{{ asset('images/jumbotron9.webp') }}" class="w-50 h-100" style="object-fit: cover;" alt="Blog Image">
                        <div class="blog">                
                            <h1 class="position-absolute text-white m-0 px-2 py-1" style="bottom: 0; left: 0px; background-color: #99D45C;">PDF</h1>
                        </div>
                    </div>
                    <div class="p-3 bg-transparent">
                        <p class="text-muted mb-1">| 06 Mei 2025</p>
                        <h5 class="fw-bold fs-2" style="color: #5E703D;">pengelolaan sampah - IAIN Metro Digital Repository...</h5>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan (2 kartu kecil) -->
            <div class="col-md-10 col-lg-3 d-flex flex-column justify-content-between h-100">
                <!-- Kartu Atas -->
                <div class="border-0 overflow-hidden rounded mb-3 flex-fill">
                    <div class="position-relative mx-auto" style="height:180px; width:140px;">
                        <img src="{{ asset('images/jumbotron10.jpg') }}" class="w-100 h-100" style="object-fit: cover;" alt="Blog Image">
                    </div>
                    <div class="p-3 bg-transparent">
                        <p class="text-muted mb-1">| 09 Mei 2025</p>
                        <h6 class="fw-bold" style="color: #5E703D;">pengelolaan sampah - dengan Digital Repository...</h6>
                    </div>
                </div>

                <!-- Kartu Bawah -->
                <div class="border-0 overflow-hidden rounded mb-3 flex-fill">
                    <div class="position-relative mx-auto" style="height:180px; width:140px;">
                        <img src="{{ asset('images/jumbotron11.jpg') }}" class="w-100 h-100" style="object-fit: cover;" alt="Blog Image">
                    </div>
                    <div class="p-3 bg-transparent">
                        <p class="text-muted mb-1">| 09 Mei 2025</p>
                        <h6 class="fw-bold"style="color: #5E703D;">pengelolaan sampah - dengan Digital Repository...</h6>
                    </div>
                </div>

        </div>
    </div>
</div>

@endsection