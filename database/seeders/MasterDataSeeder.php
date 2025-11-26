<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Pendaftar;
use App\Models\PendaftarDataSiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MasterDataSeeder extends Seeder
{
    public function run()
    {
        // Admin Keuangan
        Admin::firstOrCreate(
            ['email' => 'keuangan@test.com'],
            [
                'name' => 'Admin Keuangan',
                'password' => Hash::make('keuangan123'),
                'role' => 'keuangan'
            ]
        );

        // Sample Pendaftar untuk testing
        $pendaftar = Pendaftar::create([
            'user_id' => 1,
            'tanggal_daftar' => now(),
            'no_pendaftaran' => 'PPDB2024001',
            'gelombang_id' => 1,
            'jurusan_id' => 1,
            'status' => 'SUBMIT'
        ]);

        // Data Siswa
        PendaftarDataSiswa::create([
            'pendaftar_id' => $pendaftar->id,
            'nik' => '1234567890123456',
            'nisn' => '1234567890',
            'nama' => 'Ahmad Siswa',
            'jk' => 'L',
            'tmp_lahir' => 'Bandung',
            'tgl_lahir' => '2008-01-01',
            'alamat' => 'Jl. Contoh No. 123',
            'wilayah_id' => 1
        ]);
    }
}