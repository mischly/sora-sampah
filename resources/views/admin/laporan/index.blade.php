@extends('layouts.app')

@push('styles')
    @vite(['resources/css/petugas-css/laporan.css'])
@endpush

@section('content')
<section class="py-5">
    <div class="jumbotron-custom text-center text-white">
        <div class="overlay">
            <h1 class="fs-1">DATA LAPORAN SAMPAH ILEGAL</h1>
        </div>
    </div>
    
    <div class="container tabel-l">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
            <h4 class="fw-bold">Laporan Sampah Illegal</h4>
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
            @include('admin.laporan._table')
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
            const url = `{{ route('petugas.laporan.index') }}?q=${encodeURIComponent(query)}`;

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
