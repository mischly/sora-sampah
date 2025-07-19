@extends('layouts.app')

@push('styles')
    @vite(['resources/css/admin-css/dashboard.css'])
@endpush

@section('content')
<div class="top-banner">
    <div class="top-banner-content">
        <div class="icon-user mb-3 text-center">
            @if (Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="avatar-img rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
            @else
                <i class="bi bi-person-circle" style="font-size: 100px; color: white;"></i>
            @endif
        </div>
        
        <h1 id="sapaan" class="fs-1 text-white"></h1>
        <p>Selamat datang di Sistem Pelaporan Sora Sampah</p>
    </div>
</div>

<div class="admin-dashboard">
    <div class="overlay"></div>
    <div class="content-wrapper container-fluid">

        <!-- Statistik Kartu -->
        <div class="row g-4 justify-content-center">
            @php
            $cards = [
                ['title' => 'Total Laporan', 'value' => $totalLaporan ?? 0, 'img' => 'bg2_admin.jpg'],
                ['title' => 'Laporan Selesai', 'value' => $laporanSelesai ?? 0, 'img' => 'bg3_admin.jpg'],
                ['title' => 'Laporan Belum Ditangani', 'value' => $laporanBelum ?? 0, 'img' => 'bg4_admin.jpg'],
                ['title' => 'Total Petugas', 'value' => $totalPetugas ?? 0, 'img' => 'bg5_admin.jpg'],
                ['title' => 'Laporan Masuk Hari Ini', 'value' => $laporanHariIni ?? 0, 'img' => 'bg2_admin.jpg'],
            ];
            @endphp

            @foreach ($cards as $card)
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-image-wrapper">
                            <img src="{{ asset('images/' . $card['img']) }}" class="stat-image" alt="{{ $card['title'] }}">
                        </div>
                        <div class="stat-text">
                            <div class="stat-title">{{ $card['title'] }}</div>
                            <div class="stat-number">{{ $card['value'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Grafik Statistik -->
        <div class="judul text-center text-white">
            <h2 class="fw-bold mt-5 fs-1 mb-4">STATISTIK DATA</h2>
        </div>

        <div class="row mt-4 justify-content-center">
            <!-- Grafik Donut -->
            <div class="col-md-4 mb-4">
                <div style="background-color: #0a4d8c; padding: 20px; border-radius: 20px; height: 360px; display: flex; justify-content: center; align-items: center;">
                    <canvas id="donutChart" style="max-width: 100%; max-height: 100%;"></canvas>
                </div>
                <div class="mb-5">
                    <h2 class="fs-2 fw-bold mt-4 text-white"><i class="bi bi-pie-chart-fill"></i> <span>Data laporan wilayah</span></h2>
                </div>  
            </div>

            <!-- Grafik Line -->
            <div class="col-md-8 mb-4">
                <div style="background-color: #0a4d8c; padding: 20px; border-radius: 20px; height: 360px;">
                    <canvas id="lineChart" style="width: 100%; height: 100%;"></canvas>
                </div>
                <div class="mb-5 mx-4">
                    <h2 class="fs-2 fw-bold mt-4 text-white"><i class="bi bi-file-bar-graph-fill"></i> <span>Data laporan Masuk dan Keluar</span></h2>
                </div>  
            </div>
        </div>

    </div>
</div>

<!-- Chart.js CDN + Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script Sapaan Otomatis -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const now = new Date();
        const hour = now.getHours();

        let sapaan = "Selamat Datang";
        if (hour >= 4 && hour < 11) {
            sapaan = "Selamat Pagi";
        } else if (hour >= 11 && hour < 15) {
            sapaan = "Selamat Siang";
        } else if (hour >= 15 && hour < 18) {
            sapaan = "Selamat Sore";
        } else {
            sapaan = "Selamat Malam";
        }

        document.getElementById("sapaan").textContent = `${sapaan}, Admin`;
    });
</script>

<!-- Script Chart -->
<script>
    const bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    const laporanMasuk = @json($monthlyLaporanMasuk);
    const laporanSelesai = @json($monthlyLaporanSelesai);

    const kecamatanLabels = @json($kecamatanLabels);
    const kecamatanData = @json($kecamatanData);

    // Donut Chart
    const ctxDonut = document.getElementById('donutChart').getContext('2d');
    new Chart(ctxDonut, {
        type: 'doughnut',
        data: {
            labels: kecamatanLabels,
            datasets: [{
                data: kecamatanData,
                backgroundColor: [
                    '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0',
                    '#9966FF', '#FF9F40', '#00C49F', '#FF4444',
                    '#B0BEC5', '#C5E1A5', '#FFD54F', '#8D6E63'
                ],
                hoverOffset: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            const value = context.parsed;
                            const percent = ((value / total) * 100).toFixed(1) + '%';
                            return `${context.label}: ${value} (${percent})`;
                        }
                    }
                }
            }
        }
    });

    // Line Chart
    const ctxLine = document.getElementById('lineChart').getContext('2d');
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: bulanLabels,
            datasets: [
                {
                    label: 'Laporan Masuk',
                    data: laporanMasuk,
                    borderColor: '#36A2EB',
                    tension: 0.3,
                    fill: false
                },
                {
                    label: 'Diselesaikan',
                    data: laporanSelesai,
                    borderColor: '#4BC0C0',
                    tension: 0.3,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#fff' },
                    grid: { color: '#ffffff33' }
                },
                x: {
                    ticks: { color: '#fff' },
                    grid: { color: '#ffffff22' }
                }
            },
            plugins: {
                legend: { labels: { color: '#fff' } }
            }
        }
    });
</script>
@endsection
