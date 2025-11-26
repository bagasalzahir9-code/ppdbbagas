<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

try {
    echo "=== MEMBUAT AKUN VERIFIKATOR PEMBAYARAN ===\n\n";
    
    // Cek apakah akun sudah ada
    $existing = Admin::where('email', 'verifpay@ppdb.com')->first();
    if ($existing) {
        echo "Akun sudah ada, menghapus akun lama...\n";
        $existing->delete();
    }
    
    // Buat akun dengan role verifikator biasa
    $verifpay = Admin::create([
        'name' => 'Verifikator Pembayaran',
        'email' => 'verifpay@ppdb.com',
        'password' => Hash::make('verifpay123'),
        'role' => 'verifikator'
    ]);
    
    echo "Akun berhasil dibuat dengan ID: " . $verifpay->id . "\n";
    
    // Test password
    $passwordTest = Hash::check('verifpay123', $verifpay->password);
    echo "Test password: " . ($passwordTest ? "BERHASIL" : "GAGAL") . "\n";
    
    // Tampilkan info akun
    echo "\n=== KREDENSIAL VERIFIKATOR PEMBAYARAN ===\n";
    echo "Email: verifpay@ppdb.com\n";
    echo "Password: verifpay123\n";
    echo "Role: verifikator\n";
    
    echo "\n=== SELESAI ===\n";
    echo "Akun dapat digunakan untuk verifikasi pembayaran\n";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}