<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_pegawai' => fake()->unique()->numerify('######'),
            'nama_pegawai' => fake()->name(),
            'status_kehadiran' => 'Absen',
        ];
    }
}
