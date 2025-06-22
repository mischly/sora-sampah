@extends('layouts.app')

@section('content')

<div class="hero">
    <div class="jumbotron d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 col-lg-5">
                    <h1 class="big-title display-6 e-bold">WEBSITE SORA <br> SAMPAH BANDUNG</h1>
                    <p class="subtitle">Sora Sampah Bandung merupakan solusi digital teriintegrasi yang menghubungkan tiga pilar utama dalam pengelolaan sampah yang melibatkan warga, petugas kebersihan, dan pemerintah kota Bandung.</p>
                    <p class="lead">
                        <a class="btn-daftar btn btn-light text-primary btn-lg" href="#" role="button">Daftar</a>
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

<hr style="height: 4px; background-color: #004089; border: none;">



 {{-- ajakan --}}
    <div class="text-center py-5" style="background-color: #f8f9fa;">
        <h4 style="color: #009F4D; font-weight: 400; letter-spacing: 1px; font-size: 40px">
            MARI BERSAMA MENJADI BAGIAN PARTISIFASI AKTIF
        </h4>
        <h2 style="color: #00c600; font-weight: 800;">
            SORA SAMPAH BANDUNG
        </h2>
        <a href="/login" class="btn btn-success fw-bold px-4 py-2 mt-3" style="border-radius: 10px;">
            LOG IN
        </a>
    </div>
<hr style="height: 4px; background-color: #004089; border: none;">

{{-- Manfaat dan tujuan --}}
    <div class="jumbotron d-flex align-items-center min-vh-100">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center ">
                <div class="col-md-6 col-lg-5 text-end me-auto">
                    <div>
                    
                    <div class="align-text-center">
                        <h1 class="display-6 e-bold fs-9">Misi</h1>
                    </div>
                    
                <ul>
                    <li> Menyediakan wadah digital bagi partisipasi aktif warga</li>
                    <li>Meningkatkan efisiensi kerja petugas kebersihan</li>
                    <li> Menyediakan data akurat untuk pengambilan kebijakan</li>
                    <li>Mendorong edukasi pengelolaan sampah berkelanjutan</li>
                </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5"> 
                    <div>
                        <h1 class="display-6 e-bold fs-9">Visi</h1>
                    </div>
                
                    <p>Mewujudkan Kota Bandung yang bersih, sehat, dan lestari melalui pengelolaan sampah yang partisipatif dan berbasis teknologi.</p>
                </div> 
        
            </div>
        </div>
    </div>



<div class="container">
    <h1></h1>
</div>



@endsection
