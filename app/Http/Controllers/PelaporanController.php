<?php
namespace App\Http\Controllers;


use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('q');
    
        $pelaporans = Pelaporan::when($search, function ($query) use ($search) {
            $query->where('informasi_tambahan', 'like', "%{$search}%")
                  ->orWhere('lokasi_kejadian', 'like', "%{$search}%")
                  ->orWhere('nama_pelapor', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)                        
            ->withQueryString();     
            
        if ($request->ajax()) {
            return view('page.pelaporan._table', compact('pelaporans', 'search'))->render();
        }

        return view('page.pelaporan.index', compact('pelaporans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.pelaporan.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'lokasi_kejadian' => 'required|string|max:255',
            'kecamatan' => 'required|string',
            'jenis_sampah' => 'required|string',
            'foto_bukti' => 'required|file|mimes:jpg,jpeg,png,webp|max:5120',
            'informasi_tambahan' => 'required|string|max:1000',
        ]);

        if ($request->hasFile('foto_bukti')) {
            $file = $request->file('foto_bukti');
            
            // Buat nama file baru dengan format tanggal-jam
            $filename = now()->format('d-m-Y_H-i-s') . '.' . $file->getClientOriginalExtension();

            // Simpan ke folder public/storage/bukti_sampah
            $path = $file->storeAs('bukti_sampah', $filename, 'public');

            $validated['foto_bukti'] = $path;
        }

        Pelaporan::create($validated);

        return redirect()->route('pelaporan.index')->with('success', 'Laporan berhasil dikirim!');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        return view('page.pelaporan.show', compact('pelaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
