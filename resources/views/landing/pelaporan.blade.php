@extends('layouts.app')

@section('content') 

<div class="jumbotron-wrapper">
    <!-- Gambar -->
    <img src="{{ asset('images/jumbotron4.jpg') }}" alt="recycle" class="img-fluid w-100 jumbotron-image">
</div>

<!-- Blok hijau di bawah gambar -->
<div class="jumbotron-overlay text-center text-white px-4 py-5">
    <h1 class="fw-bold">Pelaporan Sampah ilegal</h1>
    <p class="fs-5">
        ialah laporan mengenai laporan pembuangan sampah ilegal <br>
        atau tercecer diluar fasilitas tempat sampah
    </p>
</div>  

{{-- tombol --}}   

<section class="py-5">
<div class="container my-4">
   
        <button class="btn btn-success rounded-pill px-5 py-3">+ Lapor sampah</button>
    
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Data Sampah Ilegal</h4>
    <input type="text"  placeholder="Searching...">
</div>

    <div class="table-responsive">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>LAPORAN</th>
                    <th>LOKASI</th>
                    <th>TANGGAL</th>
                    <th>PELAPOR</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                {{-- Data akan di-loop di sini --}}
                {{-- @foreach () --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><td>
                        <td></td> 
                        
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
</section>  
@endsection
