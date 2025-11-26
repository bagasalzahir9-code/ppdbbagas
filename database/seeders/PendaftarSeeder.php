<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalonSiswa;
use Illuminate\Support\Facades\Hash;

class PendaftarSeeder extends Seeder
{
    public function run()
    {
        // User CalonSiswa untuk login SPMB
        CalonSiswa::firstOrCreate(
            ['email' => 'pendaftar@test.com'],
            [
                'nama_lengkap' => 'Ahmad Pendaftar',
                'email' => 'pendaftar@test.com',
                'password' => Hash::make('pendaftar123'),
                'no_hp' => '081234567891',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2008-05-15',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Pendaftar No. 456'
            ]
        );
    }
}