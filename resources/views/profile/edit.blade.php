@extends('layouts.app')

@section('no-footer')
@endsection

@push('styles')
    @vite(['resources/css/profile/edit.css'])
@endpush

@section('content')
<div class="profile-edit-wrapper">
    <div class="card profile-card shadow">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <h3>Edit Profil</h3>
                <a href="{{ route('profile.index') }}" class="btn btn-danger"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
            </div>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        <div class="avatar-wrapper mx-auto" id="avatar-container">
                            @if (Auth::user()->avatar)
                                <img id="avatar-preview" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="avatar-img rounded-circle">
                            @else
                                <i id="avatar-preview" class="bi bi-person-circle avatar-icon"></i>
                            @endif
                        </div>
                        <label class="form-label mt-3">Ganti Foto Profil</label>
                        <input type="file" name="avatar" class="form-control" id="avatar">
                    </div>

                    {{-- Kolom 2: Info Dasar --}}
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username', Auth::user()->username) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', Auth::user()->phone) }}">
                        </div>
                    </div>

                    {{-- Kolom 3: Email + Link Ganti Password --}}
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('profile.password.form') }}" class="btn btn-outline-primary w-100"><i class="bi bi-lock me-1"></i> Ganti Password</a>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle me-1"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('avatar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const container = document.getElementById('avatar-container');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const current = document.getElementById('avatar-preview');
                if (current.tagName.toLowerCase() === 'i') {
                    const img = document.createElement('img');
                    img.id = 'avatar-preview';
                    img.src = evt.target.result;
                    img.alt = 'Avatar';
                    img.className = 'avatar-img rounded-circle';

                    container.innerHTML = '';
                    container.appendChild(img);
                } else {
                    current.src = evt.target.result;
                }
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
