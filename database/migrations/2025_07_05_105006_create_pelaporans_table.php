<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelaporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('no_telpon');
            $table->string('email');
            $table->string('lokasi_kejadian');
            $table->string('kecamatan');
            $table->string('jenis_sampah');
            $table->string('foto_bukti')->nullable();
            $table->text('informasi_tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporans');
    }
};
