@extends('layouts.app')

@push('styles')
    @vite(['resources/css/page-css/jadwal.css'])
@endpush

@section('content')

<div class="awal">
    <div class="jumbotron d-flex align-items-center py-5">
        <div>
            <div class="bg-1 row justify-content-center align-items-center" >
                <div class="col-md-6 col-lg-5 ">
                    <h1 class="big-title display-6 e-bold text-white fs-1">Jadwal Pengambilan Sampah</h1> 
                    <br>
                    <div class="piramid-text text-white">
                        <p class="line-1">Ialah data tentang penjadwalan pengambilan</p>
                        <p class="line-2">sampah yang dapat menjadi informasi</p>
                        <p class="line-3">untuk mengetahui jadwal pengambilan</p>
                        <p class="line-4">barang-barang bekas pakai masyarakat.</p>
                    </div>
                    
                </div>  
                <div class="col-md-6 col-lg-5 text-end">
                    <div class="jumbtron_img">
                      <img src="{{ asset('images/jumbotron12.jpg') }}" alt="jumbotron" width="900" width="540">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container-1 container pb-5 ">
        <div class="row-1 row justify-content-center">
            <!-- SENIN -->
            <div class="col-md-5 d-flex jadwal-card">
                <div class="hari">SENIN</div>
                <div class="info">
                    <div class="lokasi">Cimahi</div>
                    <div class="jam">Pukul 09.00-15.00</div>
                </div>
            </div>

            <!-- SELASA -->
            <div class="col-md-5 d-flex jadwal-card">
                <div class="hari">SELASA</div>
                <div class="info">
                    <div class="lokasi">Sumedang</div>
                    <div class="jam">Pukul 09.00-15.00</div>
                </div>
            </div> 

            <!-- RABU -->
            <div class="col-md-5 d-flex jadwal-card">
                <div class="hari">RABU</div>
                <div class="info">
                    <div class="lokasi">Jatinangor</div>
                    <div class="jam">Pukul 09.00-15.00</div>
                </div>
            </div>

            <!-- KAMIS -->
            <div class="col-md-5 d-flex jadwal-card">
                <div class="hari">KAMIS</div>
                <div class="info">
                    <div class="lokasi">Pasirkodja</div>
                    <div class="jam">Pukul 09.00-15.00</div>
                </div>
            </div>

            <!-- JUMAT (Tengah Sendiri) -->
            <div class="col-md-6 d-flex justify-content-center">
                <div class="d-flex jadwal-card" style="max-width: 550px;">
                    <div class="hari">JUMAT</div>
                    <div class="info">
                        <div class="lokasi">Sukamiskin</div>
                        <div class="jam">Pukul 09.00-15.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection