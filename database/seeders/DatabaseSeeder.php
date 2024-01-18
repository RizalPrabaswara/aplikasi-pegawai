<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pegawai::create([
            'nomorpegawai' => '1234567',
            'nama' => 'Rizal Prabaswara',
            'alamat' => 'Jl Tugiman 22',
            'agama' => 'islam',
            'ulangtahun' => Carbon::parse('2000-01-01'),
        ]);
        Pegawai::create([
            'nomorpegawai' => '1234568',
            'nama' => 'Rizal Coba',
            'alamat' => 'Jl Bandung 22',
            'agama' => 'islam',
            'ulangtahun' => Carbon::parse('2000-06-01'),
        ]);
        Pegawai::create([
            'nomorpegawai' => '1234560',
            'nama' => 'Rizal Baya',
            'alamat' => 'Jl Jakarta 22',
            'agama' => 'Katolik',
            'ulangtahun' => Carbon::parse('2000-01-11'),
        ]);
        Pegawai::create([
            'nomorpegawai' => '1234560',
            'nama' => 'Rizal Sasa',
            'alamat' => 'Jl Bandung 22',
            'agama' => 'Kristen',
            'ulangtahun' => Carbon::parse('2000-03-26'),
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
