<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalLaporan = Pelaporan::count();

        // Statistik status
        $laporanSelesai   = Pelaporan::where('status', 'selesai')->count();
        $laporanBelum     = $laporanBelum     = $totalLaporan - $laporanSelesai;    
        $laporanTertunda  = Pelaporan::where('status', 'tertunda')->count();
        $laporanProses    = Pelaporan::where('status', 'proses')->count();
        $laporanDitolak   = Pelaporan::where('status', 'ditolak')->count();

        // Total petugas
        $totalPetugas = User::whereHas('roles', function ($q) {
            $q->where('name', 'petugas');
        })->count();

        // Laporan masuk hari ini
        $laporanHariIni = Pelaporan::whereDate('created_at', Carbon::today())->count();

        // Data laporan masuk per bulan
        $laporanMasukDB = Pelaporan::selectRaw("MONTH(created_at) as bulan, COUNT(*) as total")
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Data laporan selesai per bulan
        $laporanSelesaiDB = Pelaporan::where('status', 'selesai')
            ->selectRaw("MONTH(created_at) as bulan, COUNT(*) as total")
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Pastikan data dari bulan 1 sampai 12 ada (isi 0 jika kosong)
        $monthlyLaporanMasuk = [];
        $monthlyLaporanSelesai = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $monthlyLaporanMasuk[] = $laporanMasukDB[$bulan] ?? 0;
            $monthlyLaporanSelesai[] = $laporanSelesaiDB[$bulan] ?? 0;
        }

        // ✅ Tambahkan Data Laporan Berdasarkan Kecamatan
        $laporanPerKecamatan = Pelaporan::select('kecamatan', DB::raw('COUNT(*) as total'))
            ->groupBy('kecamatan')
            ->get();

        $kecamatanLabels = $laporanPerKecamatan->pluck('kecamatan');
        $kecamatanData   = $laporanPerKecamatan->pluck('total');

        // ⏎ Kirim semua data ke view
        return view('admin.dashboard', compact(
            'totalLaporan',
            'laporanSelesai',
            'laporanBelum',
            'laporanTertunda',
            'laporanProses',
            'laporanDitolak',
            'totalPetugas',
            'laporanHariIni',
            'monthlyLaporanMasuk',
            'monthlyLaporanSelesai',
            'kecamatanLabels',
            'kecamatanData'
        ));
    }
}
