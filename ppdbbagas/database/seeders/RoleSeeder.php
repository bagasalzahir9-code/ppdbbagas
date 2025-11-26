<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'verifikator@spmb.com'],
            [
                'name' => 'Verifikator',
                'password' => Hash::make('password'),
                'role' => 'verifikator'
            ]
        );
        
        Admin::firstOrCreate(
            ['email' => 'keuangan@spmb.com'],
            [
                'name' => 'Keuangan',
                'password' => Hash::make('password'),
                'role' => 'keuangan'
            ]
        );
        
        Admin::firstOrCreate(
            ['email' => 'kepsek@spmb.com'],
            [
                'name' => 'Kepala Sekolah',
                'password' => Hash::make('password'),
                'role' => 'kepala_sekolah'
            ]
        );
    }
}