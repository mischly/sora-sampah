@extends('layouts.app')

@push('styles')
    @vite(['resources/css/profile/index.css'])
@endpush

@section('content')
<div class="container">
    <div class="card shadow rounded-4">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
                @if (Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle me-4" width="80" height="80" alt="Foto Profil">
                @else
                    <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-4" style="width: 80px; height: 80px; font-size: 28px;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                @endif
                <div>
                    <h4 class="mb-1">{{ Auth::user()->name }}</h4>
                    <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <hr>

            <div class="row mb-2">
                <div class="col-md-4 fw-bold">Username</div>
                <div class="col-md-8">{{ Auth::user()->username }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4 fw-bold">No. Telepon</div>
                <div class="col-md-8">{{ Auth::user()->phone ?? '-' }}</div>
            </div>

            @php
                $role = Auth::user()->roles->first()->name ?? null;
            @endphp

            @if (in_array($role, ['admin', 'petugas']))
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Role</div>
                    <div class="col-md-8">
                        <span class="badge bg-primary text-capitalize">{{ $role }}</span>
                    </div>
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-4 fw-bold">Tanggal Daftar</div>
                <div class="col-md-8">{{ Auth::user()->created_at->format('d F Y') }}</div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-dark"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
                @if (Auth::user()->id === Auth::id())
                    <a href="{{ route('profile.edit') }}" class="btn btn-info text-white">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
