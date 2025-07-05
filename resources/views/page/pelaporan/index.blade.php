@extends('layouts.app')

@push('styles')
    @vite(['resources/css/page-css/pelaporan.css'])
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

        document.getElementById('btnLaporSampah').addEventListener('click', function (e) {
            if (!isLoggedIn) {
                e.preventDefault();
                Swal.fire({
                    title: 'Login Diperlukan',
                    html: 'Untuk melaporkan sampah, silakan login terlebih dahulu.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '<i class="bi bi-box-arrow-in-right me-1"></i> Login Sekarang',
                    cancelButtonText: 'Nanti Saja',
                    confirmButtonColor: '#1e3c72',
                    cancelButtonColor: '#6c757d',
                    background: '#ffffff',
                    customClass: {
                        popup: 'rounded-4 px-4 py-3',
                        title: 'fw-bold fs-4',
                        htmlContainer: 'text-muted fs-6',
                        confirmButton: 'btn btn-primary rounded-pill px-4 py-2',
                        cancelButton: 'btn btn-secondary rounded-pill px-4 py-2 ms-2'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    }
                });
            }
        });
    });
</script>
@endpush

@section('content') 

<div class="jumbotron-wrapper">
    <img src="{{ asset('images/jumbotron4.jpg') }}" alt="recycle" class="img-fluid w-100 jumbotron-image">
</div>

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
            <a href="{{ auth()->check() ? route('pelaporan.create') : 'javascript:void(0)' }}"
                class="btn btn-success rounded-pill px-5 py-3"
                id="btnLaporSampah">+ Lapor sampah</a>
            <form method="GET" class="d-flex align-items-center gap-2" autocomplete="off">
                <input  type="text"
                        name="q"
                        value="{{ $search ?? '' }}"
                        class="form-control form-control-sm search pelaporan"
                        placeholder="Cari laporan…">
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th style="width: 60px">NO</th>
                        <th>LAPORAN</th>
                        <th>LOKASI</th>
                        <th>TANGGAL</th>
                        <th>PELAPOR</th>
                        {{-- <th>STATUS</th> --}}
                        <th style="width: 100px">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                     @forelse($pelaporans as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ Str::limit($p->informasi_tambahan, 60) }}</td>
                            <td>{{ $p->lokasi_kejadian }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}</td>
                            <td>{{ $p->nama_pelapor }}</td>

                            {{-- STATUS — aktifkan nanti setelah ada relasi petugas
                            <td>
                                @if($p->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-warning text-dark">Belum diproses</span>
                                @endif
                            </td>
                            --}}

                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('pelaporan.show', $p->id) }}" class="btn btn-white btn-outline-light" title="Detail">Detail 
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-white py-4">Belum ada laporan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $pelaporans->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>      

@endsection
