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


    // Tugas Hari Ini

    const tugasPerHari = {
        "Senin": [
            { alamat: "Jl. Gandawijaya No. 10", waktu: "08.30–09.00" },
            { alamat: "Jl. Kolonel Masturi No. 215", waktu: "11.00–12.00" },
            { alamat: "Jl. Sangkuriang No. 7", waktu: "13.30–15.00" }
        ],
        "Selasa": [
            { alamat: "Jl. Prabu Gajah Agung No. 88", waktu: "09.00–10.00" },
            { alamat: "Jl. Kutamaya No. 56", waktu: "11.00–12.30" },
            { alamat: "Jl. Cimalaka No. 33", waktu: "13.00–15.00" }
        ],
        "Rabu": [
            { alamat: "Jl. Raya Jatinangor No. 101", waktu: "08.30–09.30" },
            { alamat: "Jl. Cikuda No. 202", waktu: "10.00–11.30" },
            { alamat: "Jl. Sayang No. 45", waktu: "13.00–15.00" }
        ],
        "Kamis": [
            { alamat: "Jl. Terusan Pasirkoja No. 120", waktu: "09.00–10.00" },
            { alamat: "Jl. Holis No. 300", waktu: "11.00–12.30" },
            { alamat: "Jl. Caringin No. 88", waktu: "13.00–15.00" }
        ],
        "Jumat": [
            { alamat: "Jl. Sukamiskin No. 1", waktu: "09.00–10.00" },
            { alamat: "Jl. Kuningan No. 50", waktu: "11.00–12.00" },
            { alamat: "Jl. Kebon Waru No. 77", waktu: "13.00–15.00" }
        ]
    };

    document.addEventListener('DOMContentLoaded', () => {
        const listContainer = document.getElementById('tugasList');
        const sisaCounter = document.getElementById('sisaTugas');

        const hari = new Date().toLocaleDateString('id-ID', { weekday: 'long' });
        const tugasHariIni = tugasPerHari[hari] || [];

        // Simpan status checklist (index: true/false)
        const checklistStatus = new Array(tugasHariIni.length).fill(false);

        function renderList() {
            // Urutkan berdasarkan status selesai
            const orderedList = tugasHariIni
                .map((item, index) => ({ ...item, index, selesai: checklistStatus[index] }))
                .sort((a, b) => a.selesai - b.selesai); // selesai false di atas, true di bawah

            listContainer.innerHTML = '';

            orderedList.forEach((item) => {
                const li = document.createElement('li');
                li.className = 'tugas-item';
                li.dataset.index = item.index;

                if (item.selesai) li.classList.add('selesai');

                li.innerHTML = `
                    <label class="checkbox-container">
                        <input type="checkbox" onchange="toggleTugas(this)" ${item.selesai ? 'checked' : ''}>
                        <span class="checkmark"></span>
                    </label>
                    <div class="tugas-info">
                        <strong>${item.alamat}</strong><br>
                        <span>${item.waktu}</span>
                    </div>
                    <div class="action-icons">
                        <button class="btn-done"><i class="bi bi-check-circle-fill"></i></button>
                    </div>
                `;
                li.querySelector('.btn-done').addEventListener('click', () => {
                const checkbox = li.querySelector('input[type="checkbox"]');
                checkbox.checked = !checkbox.checked;
                window.toggleTugas(checkbox);
                });

                listContainer.appendChild(li);
            });

            const sisa = checklistStatus.filter(status => !status).length;
            sisaCounter.textContent = `Tersisa ${sisa}`;

            document.getElementById('jumlahTugasHariIni').textContent = sisa;
        }

        window.toggleTugas = function(checkbox) {
            const item = checkbox.closest('.tugas-item');
            const index = parseInt(item.dataset.index);

            checklistStatus[index] = checkbox.checked;
            renderList(); // refresh tampilan agar urutan disusun ulang
        };
        
        renderList();
    });


    const tanggalHari = document.getElementById('tanggalHariIni');
    const today = new Date();

    const hariNama = today.toLocaleDateString('id-ID', { weekday: 'long' });
    const tanggalLengkap = today.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });

    tanggalHari.textContent = `${hariNama}, ${tanggalLengkap}`;
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
                <div class="circle" id="jumlahTugasHariIni">0</div>
                <p>Tugas Hari ini</p>
            </div>
            <div class="box">
                <div class="circle">{{ $jumlahSelesai }}</div>
                <p>Lapoan Selesai</p>
            </div>
            <div class="box">
                <div class="circle">{{ $jumlahTertunda }}</div>
                <p>Laporan Tertunda</p>
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
        <section class="tugas-hari-ini-section">
            <div class="tugas-card">
                <div class="tanggal-hari" id="tanggalHariIni"></div>
                <div class="tugas-header">
                    <div class="tugas-header-text">
                        <h3 class="fs-3 fw-bold">Tugas Hari ini</h3>
                    </div>
                    <span class="badge-sisa" id="sisaTugas">Tersisa 3</span>
                </div>
                <ul class="tugas-list" id="tugasList"></ul>
            </div>
        </section>        
    </section>
</div>

@endsection
