@extends('layouts.app')

@section('no-footer')
@endsection

@section('content')
<div class="hero-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-login card border-0 shadow-lg rounded-4 p-4 py-5   " style="background-color: #f8f9fa;">
                    <div class="row align-items-center">
                        <!-- Form Kiri -->
                        <div class="col-md-6 px-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-4 input-icon">
                                    <i class="bi bi-person-fill icon-input"></i>
                                    <input id="email" type="email" class="form-control rounded-pill ps-5 @error('email') is-invalid @enderror" name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <div class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4 input-icon">
                                    <i class="bi bi-key-fill icon-input"></i>
                                    <input id="password" type="password" class="form-control rounded-pill ps-5 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </div>
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
                                        <img src="{{ asset('images/google-icon.svg')    }}" alt="Facebook">
                                    </a>
                                    <a href="#" class="social-icon">
                                        <img src="{{ asset('images/fb-icon.svg') }}" alt="Google">
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
