<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\CalonSiswa;

echo "=== TEST NOTIFIKASI LULUS ===\n\n";

// Cari siswa yang ada
$siswa = CalonSiswa::first();
echo "Semua siswa yang ada:\n";
$allSiswa = CalonSiswa::all();
foreach ($allSiswa as $s) {
    echo "- ID: {$s->id}, Email: {$s->email}, Status: {$s->status}\n";
}
echo "\n";

if ($siswa) {
    echo "Menggunakan siswa pertama untuk testing:\n";
    echo "ID: {$siswa->id}\n";
    echo "Nama: {$siswa->nama_lengkap}\n";
    echo "Email: {$siswa->email}\n";
    echo "Status saat ini: {$siswa->status}\n\n";
    
    // Ubah status menjadi lulus untuk testing
    echo "Mengubah status menjadi 'lulus'...\n";
    $siswa->update(['status' => 'lulus']);
    echo "✅ Status berhasil diubah!\n\n";
    
    echo "Sekarang login dengan akun {$siswa->email} untuk melihat notifikasi penerimaan.\n";
    echo "URL: http://127.0.0.1:8000/spmb/notifikasi\n";
} else {
    echo "Tidak ada siswa yang ditemukan!\n";
}

echo "\n=== SELESAI ===\n";