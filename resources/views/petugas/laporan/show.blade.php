@extends('layouts.app')

@push('styles')
    @vite(['resources/css/page-css/show-pelaporan.css'])
@endpush

@section('no-footer')
@endsection

@section('content')

<div class="detail-header text-center text-success mb-5">
    <h2 class="fw-bold m-0">Detail Laporan Sampah</h2>
</div>

<div class="container mb-5">
    <div class="row g-4">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $pelaporan->foto_bukti) }}"
                 class="img-fluid rounded-4 shadow-sm w-100"
                 alt="Foto Sampah">
        </div>

        <div class="col-md-6 d-flex flex-column">
            <div class="info-card p-4 rounded-4 shadow-sm flex-grow-1">
                <h4 class="mb-3 text-success">Informasi Laporan</h4>
                <p><strong>Pelapor:</strong> {{ $pelaporan->nama_pelapor }}</p>
                <p><strong>Tanggal Lapor:</strong> {{ $pelaporan->created_at->format('d M Y') }}</p>
                <p><strong>Lokasi:</strong> {{ $pelaporan->lokasi_kejadian }}</p>
                <p><strong>Kecamatan:</strong> {{ $pelaporan->kecamatan }}</p>
                <p><strong>Jenis Sampah:</strong> {{ $pelaporan->jenis_sampah }}</p>
                <p><strong>Deskripsi:</strong></p>
                <div class="desc-box">{{ $pelaporan->informasi_tambahan }}</div>
                @if (Auth::check() && Auth::user()->hasRole('petugas'))    
                    @if ($pelaporan->status === 'tertunda')
                    <form id="form-selesai" method="POST" action="{{ route('petugas.laporan.selesai', $pelaporan->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="button" id="btn-konfirmasi" class="btn btn-success mt-4 w-100" title="Tandai Selesai">
                            Perbarui Status Laporan ke Selesai <i class="fas fa-check-circle"></i>
                        </button>
                    </form>
                    @endif
                @endif
            </div>

            <a href="{{ route('petugas.laporan.index') }}"
               class="btn btn-success mt-3 rounded-pill btn-kembali">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('btn-konfirmasi').addEventListener('click', function (e) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Laporan akan ditandai sebagai selesai.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, tandai selesai!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-selesai').submit();
            }
        });
    });
</script>
@endpush
