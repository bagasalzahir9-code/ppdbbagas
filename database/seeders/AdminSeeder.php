<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin Panitia',
            'email' => 'admin@ppdb.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        Admin::create([
            'name' => 'Verifikator PPDB',
            'email' => 'verifikator@ppdb.com',
            'password' => Hash::make('verifikator123'),
            'role' => 'verifikator'
        ]);

        Admin::create([
            'name' => 'Verifikator Pembayaran',
            'email' => 'verifpay@ppdb.com',
            'password' => Hash::make('verifpay123'),
            'role' => 'keuangan'
        ]);

        Admin::create([
            'name' => 'Staff Keuangan',
            'email' => 'keuangan@ppdb.com',
            'password' => Hash::make('keuangan123'),
            'role' => 'keuangan'
        ]);

        Admin::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@ppdb.com',
            'password' => Hash::make('kepsek123'),
            'role' => 'kepala_sekolah'
        ]);
    }
}