@extends('layouts.app')

@section('content')

<div class="hero">
    <div class="jumbotron d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 col-lg-5">
                    <h1 class="display-6 e-bold fs-9">WEBSITE SORA <br> SAMPAH BANDUNG</h1>
                    <p>Sora Sampah Bandung merupakan solusi digital teriintegrasi yang menghubungkan tiga pilar utama dalam pengelolaan sampah yang melibatkan warga, petugas kebersihan, dan pemerintah kota Bandung.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
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



  {{-- visi misi --}}
    <div class="jumbotron d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center align-items-center ">
                <div class="col-md-6 col-lg-5 text-end me-auto">
                    <div class="jumbtron_img">
                      <img src="{{ asset('images/favicon.png') }}" alt="jumbotron" width="400">
                    </div>
                  </div>

                <div class="col-md-6 col-lg-5"> 
                    <div class="col-md-2 col-lg-2">
                        <h1 class="display-6 e-bold fs-9"  style="background-color: #004089; padding: 5px; color: white; border-radius:15px;">Visi</h1>
                    </div> <br>
                    <ul>
                        <li style="list-style-type: none;">Mewujudkan Kota Bandung yang bersih, sehat, dan lestari melalui pengelolaan sampah yang partisipatif dan berbasis teknologi.</li>
                    </ul>

                    <br>

                    <div class="col-md-2 col-lg-2">
                        <h1 class="display-6 e-bold fs-9" style="background-color: #004089; padding: 5px; color: white; border-radius:15px;">Misi</h1>
                    </div><br>
                    
                   <ul>
                    <li> Menyediakan wadah digital bagi partisipasi aktif warga</li>
                    <li>Meningkatkan efisiensi kerja petugas kebersihan</li>
                    <li> Menyediakan data akurat untuk pengambilan kebijakan</li>
                    <li>Mendorong edukasi pengelolaan sampah berkelanjutan</li>
                   </ul>
    
                </div> 
           
            </div>
        </div>
    </div>

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
