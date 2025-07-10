<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function dashboard()
    {
    
        $jumlahTertunda = Pelaporan::where('status', 'tertunda')->count();
        $jumlahSelesai = Pelaporan::where('status', 'selesai')->count();

        return view('petugas.dashboard', compact('jumlahTertunda', 'jumlahSelesai'));
    }

}
