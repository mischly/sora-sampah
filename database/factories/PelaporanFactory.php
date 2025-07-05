<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelaporan>
 */
class PelaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pelapor' => $this->faker->name(),
            'no_telpon' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'lokasi_kejadian' => $this->faker->address(),
            'kecamatan' => $this->faker->randomElement([
                'andir', 'antapani', 'arcamanik', 'astanaanyar',
                'babakan_ciparay', 'bandung_kidul', 'bandung_kulon',
                'bandung_wetan', 'batununggal', 'bojongloa_kaler',
                'bojongloa_kidul', 'buah_batu', 'cibeunying_kaler',
                'cibeunying_kidul', 'cibiru', 'cicendo', 'cidadap',
                'cinambo', 'coblong', 'gedebage', 'kiaracondong',
                'lengkong', 'mandalajati', 'panyileukan', 'rancasari',
                'regol', 'sukajadi', 'sukasari', 'sumur_bandung',
                'ujungberung'
            ]),
            'jenis_sampah' => $this->faker->randomElement(['organik', 'anorganik', 'b3']),
            'foto_bukti' => 'bukti_sampah/default.jpg', // bisa kamu ganti dengan dummy image default
            'informasi_tambahan' => $this->faker->sentence(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
