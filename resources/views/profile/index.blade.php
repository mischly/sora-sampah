@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/profile/index.css'])
@endpush

@section('content')
<div class="profile-wrapper">
    <div class="card shadow rounded-4">
        <div class="card-body p-5">
            <div class="d-flex align-items-center mb-5">
                <div class="me-4 d-flex align-items-center justify-content-center avatar-wrapper">
                    @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="avatar-img rounded-circle">
                    @else
                        <i class="bi bi-person-circle avatar-icon"></i>
                    @endif
                </div>
                <div>
                    <h3 class="mb-1">{{ Auth::user()->name }}</h3>
                    <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Username</div>
                <div class="col-md-8">{{ Auth::user()->username }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 fw-bold">No. Telepon</div>
                <div class="col-md-8">{{ Auth::user()->phone ?? '-' }}</div>
            </div>

            @php
                $role = Auth::user()->roles->first()->name ?? null;
            @endphp

            @if (in_array($role, ['admin', 'petugas']))
                <div class="row mb-3">
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
                <a href="{{ url('/') }}" class="btn btn-danger"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
                <a href="{{ route('profile.edit') }}" class="btn btn-info text-white"><i class="bi bi-pencil-square me-1"></i> Edit Profil</a>
            </div>
        </div>
    </div>
</div>
@endsection
