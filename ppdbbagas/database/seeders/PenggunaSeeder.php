<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Admin PPDB',
                'email' => 'admin@ppdb.com',
                'hp' => '081234567890',
                'password_hash' => Hash::make('admin123'),
                'role' => 'admin',
                'aktif' => 1
            ],
            [
                'nama' => 'Verifikator Administrasi',
                'email' => 'verifikator@ppdb.com',
                'hp' => '081234567891',
                'password_hash' => Hash::make('verif123'),
                'role' => 'verifikator_adm',
                'aktif' => 1
            ],
            [
                'nama' => 'Bagian Keuangan',
                'email' => 'keuangan@ppdb.com',
                'hp' => '081234567892',
                'password_hash' => Hash::make('keuangan123'),
                'role' => 'keuangan',
                'aktif' => 1
            ],
            [
                'nama' => 'Kepala Sekolah',
                'email' => 'kepsek@ppdb.com',
                'hp' => '081234567893',
                'password_hash' => Hash::make('kepsek123'),
                'role' => 'kepsek',
                'aktif' => 1
            ],
            [
                'nama' => 'Calon Siswa Test',
                'email' => 'siswa@ppdb.com',
                'hp' => '081234567894',
                'password_hash' => Hash::make('siswa123'),
                'role' => 'pendaftar',
                'aktif' => 1
            ]
        ];

        foreach ($users as $user) {
            Pengguna::create($user);
        }
    }
}