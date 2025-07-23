<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}?v=1">
    <title>{{ config('app.name', 'Sora Sampah Bandung') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!--  Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <!-- CSS --->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Sora Sampah Bandung" width="230px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <!-- SUDAH LOGIN -->
                        @auth
                            <!-- Admin Navbar -->
                            @if (Auth::user()->hasRole('admin'))
                            <li  class="nav-item">
                                <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">DASHBOARD</a>
                            </li>

                            <li  class="nav-item">
                                <a class="nav-link {{ request()->is('admin/laporan') ? 'active' : '' }}" href="{{ route('admin.laporan.index') }}">LAPORAN</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('artikel') ? 'active' : '' }}" href="{{ route('artikel.index') }}">ARTIKEL</a>
                            </li>

                            <li  class="nav-item">
                                <a class="nav-link {{ request()->is('jadwal') ? 'active' : '' }}" href="{{ route('jadwal.index') }}">JADWAL</a>
                            </li>
                     
                            <li  class="nav-item">
                                <a class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">USER</a>
                            </li>

                            @endif

                            <!-- Petugas Navbar -->
                            @if (Auth::user()->hasRole('petugas'))
                                <li  class="nav-item">
                                    <a class="nav-link {{ request()->is('petugas') ? 'active' : '' }}" href="{{ route('petugas.dashboard') }}">DASHBOARD</a>
                                </li>
                                <li  class="nav-item">
                                    <a class="nav-link {{ request()->is('petugas/laporan') ? 'active' : '' }}" href="{{ route('petugas.laporan.index') }}">LAPORAN</a>
                                </li>
                                <li  class="nav-item">
                                    <a class="nav-link {{ request()->is('jadwal') ? 'active' : '' }}" href="{{ route('jadwal.index') }}">JADWAL</a>
                                </li>
                            @endif
                            
                            <!-- User Navbar -->
                            @if (Auth::user()->hasRole('user'))
                                <li  class="nav-item">
                                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">BERANDA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('pelaporan') ? 'active' : '' }}" href="{{ route('pelaporan.index') }}">PELAPORAN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('artikel') ? 'active' : '' }}" href="{{ route('artikel.index') }}">ARTIKEL</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('jadwal') ? 'active' : '' }}" href="{{ route('jadwal.index') }}">JADWAL</a>
                                </li>
                            @endif
                        @endauth
                        
                        <!-- BELUM LOGIN -->
                        @guest
                            <!-- User Navbar -->
                            <li  class="nav-item">
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">BERANDA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('pelaporan') ? 'active' : '' }}" href="{{ route('pelaporan.index') }}">PELAPORAN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('artikel') ? 'active' : '' }}" href="{{ route('artikel.index') }}">ARTIKEL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('jadwal') ? 'active' : '' }}" href="{{ route('jadwal.index') }}">JADWAL</a>
                            </li>
                        @if (Route::has('login'))
                            <li class="nav-item login">    
                                <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item register">
                                <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown user-dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle user-avatar no-underline" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="avatar-img">
                                @else
                                    <i class="bi bi-person-circle"></i>
                                @endif  
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end animated-dropdown" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bi bi-person me-2"></i> Profil</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                            {{-- MOBILE LINKS SEPARATELY --}}
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="{{ route('profile.index') }}">
                                    <i class="bi bi-person me-1"></i> Profil
                                </a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </a>
                                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="content-wrapper-flex">
            @yield('content')
        </main>

        @if (!View::hasSection('no-footer'))
            @include('partials.footer')
        @endif
    </div>


    {{-- Sweetalert Toast ver --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            customClass: {
            cpopup: 'colored-toast'
            }
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            customClass: {
                popup: 'colored-toast'
            }
        });
    </script>
    @endif

    @stack('scripts')
</body>
</html>
