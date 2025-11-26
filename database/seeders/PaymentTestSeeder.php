<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalonSiswa;

class PaymentTestSeeder extends Seeder
{
    public function run()
    {
        // Update existing students with payment data
        $students = CalonSiswa::limit(5)->get();
        
        foreach ($students as $index => $student) {
            $student->update([
                'status' => $index < 3 ? 'menunggu_pembayaran' : 'terbayar',
                'nominal_pembayaran' => 500000 + ($index * 50000),
                'bukti_pembayaran' => 'bukti_' . $student->id . '.jpg',
                'tanggal_pembayaran' => now()->subDays($index)
            ]);
        }
        
        echo "Payment test data created for " . count($students) . " students\n";
    }
}