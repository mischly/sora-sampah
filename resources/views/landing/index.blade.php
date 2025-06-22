@extends('layouts.app')

@section('content')

<div class="hero">
    <div class="jumbotron d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 col-lg-5">
                    <h1 class="big-title display-6 e-bold">WEBSITE SORA <br> SAMPAH BANDUNG</h1>
                    <p class="subtitle">Sora Sampah Bandung merupakan solusi digital teriintegrasi yang menghubungkan tiga pilar utama dalam pengelolaan sampah yang melibatkan warga, petugas kebersihan, dan pemerintah kota Bandung.</p>
                    <p class="lead text-center text-md-start">
                        <a class="btn daftar fs-5 fw-bold" href="/register" role="button">Daftar</a>
                    </p>
                </div>  
                <div class="col-md-6 col-lg-5 text-end">
                    <div class="jumbtron_img">
                      <img src="{{ asset('images/jumbotron.png') }}" alt="jumbotron" width="400">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Visi Misi Section --}}
<section class="visi-misi-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            {{-- Logo Section --}}
            <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                <div class="logo-container text-center">
                    <img src="{{ asset('images/favicon.png') }}" 
                         alt="Logo Pengelolaan Sampah Digital" 
                         class="img-fluid logo-img">
                </div>
            </div>

            {{-- Visi Misi Content --}}
            <div class="col-lg-7 col-md-6">
                <div class="content-wrapper">
                    {{-- Visi Section --}}
                    <div class="visi-section mb-5">
                        <div class="visi-badge-container mb-3">
                            <span class="visi-badge">VISI</span>
                        </div>
                        <p class="visi-text">
                            Mewujudkan Kota Bandung yang bersih, sehat, dan 
                            lestari melalui pengelolaan sampah yang partisipatif 
                            dan berbasis teknologi.
                        </p>
                    </div>

                    {{-- Misi Section --}}
                    <div class="misi-section">
                        <div class="misi-badge-container mb-4">
                            <span class="misi-badge">MISI</span>
                        </div>
                        <ul class="misi-list">
                            <li class="misi-item">
                                Menyediakan wadah digital bagi partisipasi aktif warga
                            </li>
                            <li class="misi-item">
                                Meningkatkan efisiensi kerja petugas kebersihan
                            </li>
                            <li class="misi-item">
                                Menyediakan data akurat untuk pengambilan kebijakan
                            </li>
                            <li class="misi-item">
                                Mendorong edukasi pengelolaan sampah berkelanjutan
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Join with us section --}}
<img src="{{ asset('images/jumbotron2.jpg') }}" alt="recycle" class="recycle-img img-fluid w-100">
<section class="join-us py-5">
    <div class="container">
        <div class="subtitle-jumbotron2 text-center py-5">
            <h4>MARI BERSAMA MENJADI BAGIAN PARTISIFASI AKTIF</h4>
            <h1>SORA SAMPAH BANDUNG</h1>
            <a href="/login" class="btn-join btn fw-bold px-4 py-2 mt-3 fs-3">Bergabunglah bersama kami !</a>
        </div>
    </div>
</section>

{{-- Target and Benefit --}}
<div class="jumbotron d-flex align-items-center min-vh-100">
    <div class="container py-5">
        <div class="row align-items-start">
            <div class="col-md-5 col-lg-5">
                <h1 class="target e-bold">TUJUAN</h1>
                <ul class="tb-list mt-3">
                    <li>Meningkatkan partisipasi aktif warga Kota Bandung</li>
                    <li>Meningkatkan efisiensi operasional petugas kebersihan</li>
                    <li>Menyediakan data real-time untuk pengambilan keputusan</li>
                    <li>Mengurangi penumpukan sampah ilegal</li>
                    <li>Mendukung program pengelolaan sampah berkelanjutan</li>
                </ul>
            </div>
            <div class="col-md-5 col-lg-5">
                <h1 class="benefit e-bold">MANFAAT</h1>
                <ul class="tb-list mt-3">
                    <li>Lingkungan yang lebih bersih dan sehat</li>
                    <li>Kemudahan akses informasi pengelolaan sampah</li>
                    <li>Saluran komunikasi efektif antara warga, petugas dan pemerintah</li>
                    <li>Peningkatan rasa kepedulian dan tanggung jawab masyarakat</li>
                    <li>Terciptanya komunitas peduli lingkungan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- Transition image --}}
<img src="{{ asset('images/jumbotron3.png') }}" alt="j3" class="bottle-img img-fluid w-100">

@endsection
