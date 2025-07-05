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

        // === AJAX pagination & search ===
        const tableContainer = document.getElementById('tableContainer');

        tableContainer.addEventListener('click', function (e) {
            const target = e.target.closest('a');
            if (target && target.closest('.pagination-custom')) {
                e.preventDefault();
                const url = target.getAttribute('href');

                fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.text())
                .then(html => {
                    tableContainer.innerHTML = html;
                })
                .catch(err => console.error(err));
            }
        });

        const searchForm = document.querySelector('form[method="GET"]');
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const query = this.querySelector('input[name="q"]').value;
            const url = `{{ route('pelaporan.index') }}?q=${encodeURIComponent(query)}`;

            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                tableContainer.innerHTML = html;
            })
            .catch(err => console.error(err));
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
                <input type="text"
                       name="q"
                       value="{{ $search ?? '' }}"
                       class="form-control form-control-sm search pelaporan"
                       placeholder="Cari laporan…">
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <div class="table-responsive" id="tableContainer">
            @include('page.pelaporan._table')
        </div>
    </div>
</section>

@endsection
