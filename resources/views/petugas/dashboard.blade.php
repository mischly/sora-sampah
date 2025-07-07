@extends('layouts.app')

@push('styles')
    @vite(['resources/css/petugas-css/dashboard.css'])
@endpush

@push('scripts')
<script>
    function getGreeting() {
        const now = new Date();
        const hour = now.getHours();
        let waktu;

        if (hour >= 5 && hour < 12) {
            waktu = 'Pagi';
        } else if (hour >= 12 && hour < 15) {
            waktu = 'Siang';
        } else if (hour >= 15 && hour < 19) {
            waktu = 'Sore';
        } else {
            waktu = 'Malam';
        }

        const name = @json(Auth::user()->name);
        document.getElementById('greetingText').innerText = `Selamat ${waktu}, ${name}`;
    }

    document.addEventListener('DOMContentLoaded', getGreeting);

    setInterval(getGreeting, 60000);
</script>
@endpush

@section('content')
<div class="dashboard-container">
    <div class="jumbotron">
        <div class="overlay"></div>
        <div class="profile-section">
            {{-- FOTO PROFILE PLACEHOLDER --}}
            <img src="{{ asset('images/mantap.png') }}" alt="Profile" class="profile-img">
            <div class="greeting">
                <h4 id="greetingText" class="fs-2"></h4>
                <p class="badge" style="font-size: 16px">{{ Auth::user()->role ?? 'Petugas' }}</p>
            </div>
            <div class="notif-icon">
                <i class="bi bi-bell-fill"></i>
            </div>
        </div>
        <div class="summary-boxes">
            <div class="box">
                <div class="circle">5</div>
                <p>Tugas Hari ini</p>
            </div>
            <div class="box">
                <div class="circle">2</div>
                <p>Selesai</p>
            </div>
            <div class="box">
                <div class="circle">3</div>
                <p>Tertunda</p>
            </div>
        </div>
    </div>
    <section class="aksi-cepat-section">
        <h3 class="aksi-title">Aksi Cepat</h3>
        <div class="aksi-container">
            <a href="#" class="aksi-card laporan">
                <i class="bi bi-exclamation-circle-fill"></i>
                <span>Laporan</span>
            </a>
            <a href="#" class="aksi-card jadwal">
                <i class="bi bi-calendar-event-fill"></i>
                <span>Jadwal</span>
            </a>
        </div>
    </section>

</div>

@endsection
