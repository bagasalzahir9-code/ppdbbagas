<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\CalonSiswa;

class CalonSiswaSeeder extends Seeder
{
    public function run(): void
    {
        CalonSiswa::create([
            'nama_lengkap' => 'Ahmad Rizki Pratama',
            'email' => 'ahmad@siswa.com',
            'password' => Hash::make('siswa123'),
            'jurusan_pilihan' => 'PPLG',
            'status' => 'draft'
        ]);

        CalonSiswa::create([
            'nama_lengkap' => 'Siti Nurhaliza',
            'email' => 'siti@siswa.com', 
            'password' => Hash::make('siswa123'),
            'jurusan_pilihan' => 'AKUNTANSI',
            'status' => 'dikirim'
        ]);

        CalonSiswa::create([
            'nama_lengkap' => 'Budi Santoso',
            'email' => 'budi@siswa.com',
            'password' => Hash::make('siswa123'),
            'jurusan_pilihan' => 'DKV',
            'status' => 'lulus'
        ]);
    }
}