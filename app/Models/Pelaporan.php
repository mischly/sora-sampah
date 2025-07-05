<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelapor',
        'no_telpon',
        'email',
        'lokasi_kejadian',
        'kecamatan',
        'jenis_sampah',
        'foto_bukti',
        'informasi_tambahan',
    ];
}
