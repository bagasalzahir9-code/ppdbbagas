<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\Pendaftar;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        $pendaftar = Pendaftar::all();
        
        foreach ($pendaftar as $p) {
            // Pembayaran pendaftaran
            Pembayaran::create([
                'pendaftar_id' => $p->id,
                'jenis_pembayaran' => 'pendaftaran',
                'jumlah' => 150000,
                'tanggal_bayar' => now()->subDays(rand(1, 30)),
                'status' => ['pending', 'lunas', 'ditolak'][rand(0, 2)]
            ]);
            
            // Pembayaran daftar ulang
            if (rand(0, 1)) {
                Pembayaran::create([
                    'pendaftar_id' => $p->id,
                    'jenis_pembayaran' => 'daftar_ulang',
                    'jumlah' => 500000,
                    'tanggal_bayar' => now()->subDays(rand(1, 15)),
                    'status' => ['pending', 'lunas'][rand(0, 1)]
                ]);
            }
        }
    }
}