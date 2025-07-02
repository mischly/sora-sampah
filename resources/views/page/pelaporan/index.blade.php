@extends('layouts.app')

@push('styles')
    @vite(['resources/css/page-css/pelaporan.css'])
@endpush

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

<section class="py-5">
    <div class="container my-4">
        <h4 class="fw-bold">Data Sampah Ilegal</h4>
        <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
            <button class="btn btn-success rounded-pill px-5 py-3">+ Lapor sampah</button>
            <input type="text"  placeholder="Cari..." class="search pelaporan">
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
                            <td></td>
                            <td></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    {{-- <a href="{{ route('pelaporan.show') }}" tambahkan , $p->id untuk mengidentifikasi id --}}
                                        {{-- class="btn btn-outline-info" title="Detail"> --}}
                                        <i class="fas fa-eye"></i> Detail
                                    {{-- </a>  --}}
                                </div>
                            </td>
                                </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</section>  
@endsection
