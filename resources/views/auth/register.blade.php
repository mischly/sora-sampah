@extends('layouts.app')

@section('no-footer')
@endsection

@section('content')
<div class="hero-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-login card border-0 shadow-lg rounded-4 p-4 py-5" style="background-color: #f8f9fa;">
                    <div class="row align-items-center">
                        <!-- Gambar Kiri -->
                        <div class="col-md-6 d-none d-md-block text-center">
                            <img src="{{ asset('images/2.jpg') }}" alt="Register Illustration" class="img-fluid register" style="max-height: 300px;">
                        </div>

                        <!-- Form Kanan -->
                        <div class="col-md-6 px-4"> 
                            <form method="POST" action="{{ route('register') }}" autocomplete="off">
                                @csrf

                                {{-- Nama Lengkap --}}
                                <div class="mb-4">
                                    <div class="input-wrapper @error('name') error @enderror">
                                        <i class="bi bi-person-fill input-icon"></i>
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" autocomplete="new-name" required autofocus>
                                    </div>
                                    @error('name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Username --}}
                                <div class="mb-4">
                                    <div class="input-wrapper @error('username') error @enderror">
                                        <i class="bi bi-person-fill input-icon"></i>
                                        <input id="username" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" autocomplete="new-username" required>
                                    </div>
                                    @error('username')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="mb-4">
                                    <div class="input-wrapper @error('email') error @enderror">
                                        <i class="bi bi-envelope-fill input-icon"></i>
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="new-email" required>
                                    </div>
                                    @error('email')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Handphone --}}
                                <div class="mb-4">
                                    <div class="input-wrapper @error('phone') error @enderror">
                                        <i class="bi bi-telephone-fill input-icon"></i>
                                        <input id="phone" type="text" class="form-control" name="phone" placeholder="Handphone" value="{{ old('phone') }}" autocomplete="new-phone" required>
                                    </div>
                                    @error('phone')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="mb-4">
                                    <div class="input-wrapper @error('password') error @enderror">
                                        <i class="bi bi-key-fill input-icon"></i>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" autocomplete="new-password" required>
                                    </div>
                                    @error('password')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Password Confirmation --}}
                                <div class="mb-4">
                                    <div class="input-wrapper">
                                        <i class="bi bi-key-fill input-icon"></i>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" autocomplete="new-password-confirmation" required>
                                    </div>
                                </div>

                                <div class="mb-3 text-center small">
                                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary rounded-pill fw-bold py-2">
                                        REGISTRASI
                                    </button>
                                </div>
                                <div class="text-center mt-3 small text-muted"> 
                                    Dengan menekan daftar, saya akan menyetujui
                                    <a href="#" class="text-decoration-none">Kebijakan Privasi</a> dan
                                    <a href="#" class="text-decoration-none">Syarat & Ketentuan</a> di Sora Sampah Bandung
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
