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
                        <!-- Form Kiri -->
                        <div class="col-md-6 px-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- Email Field --}}
                                <div class="mb-4">
                                    <div class="input-wrapper @error('email') error @enderror">
                                        <i class="bi bi-person-fill input-icon"></i>
                                        <input id="email" 
                                            type="email" 
                                            class="form-control" 
                                            name="email" 
                                            placeholder="Email" 
                                            value="{{ old('email') }}" 
                                            required 
                                            autocomplete="email" 
                                            autofocus>
                                    </div>
                                    @error('email')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Password Field --}}
                                <div class="mb-4">
                                    <div class="input-wrapper @error('password') error @enderror">
                                        <i class="bi bi-key-fill input-icon"></i>
                                        <input id="password" 
                                            type="password" 
                                            class="form-control" 
                                            name="password" 
                                            placeholder="Password" 
                                            required 
                                            autocomplete="current-password">
                                    </div>
                                    @error('password')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 text-center small">
                                    Belum punya akun? <a href="{{ route('register') }}">Registrasi</a>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary rounded-pill fw-bold py-2">
                                        LOGIN
                                    </button>
                                </div>

                                <div class="text-center mt-3 mb-2">
                                    <small>Atau login dengan</small>
                                </div>

                                <div class="d-flex justify-content-center gap-3 social-login">
                                    <a href="#" class="social-icon">
                                        <img src="{{ asset('images/google-icon.svg') }}" alt="Google">
                                    </a>
                                    <a href="#" class="social-icon">
                                        <img src="{{ asset('images/fb-icon.svg') }}" alt="Facebook">
                                    </a>
                                </div>
                            </form>
                        </div>
                        <!-- Gambar Kanan -->
                        <div class="col-md-6 d-none d-md-block text-center">
                            <img src="{{ asset('images/login-icon.png') }}" alt="Login Illustration" class="img-fluid" style="max-height: 280px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
