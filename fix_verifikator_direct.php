<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

try {
    echo "=== MEMPERBAIKI AKUN VERIFIKATOR ===\n\n";
    
    // Hapus akun verifikator lama
    $deleted = Admin::where('email', 'verifikator@ppdb.com')->delete();
    echo "Akun lama dihapus: $deleted\n";
    
    // Buat akun verifikator baru
    $verifikator = Admin::create([
        'name' => 'Verifikator PPDB',
        'email' => 'verifikator@ppdb.com',
        'password' => Hash::make('verifikator123'),
        'role' => 'verifikator'
    ]);
    
    echo "Akun baru dibuat dengan ID: " . $verifikator->id . "\n";
    
    // Test password
    $passwordTest = Hash::check('verifikator123', $verifikator->password);
    echo "Test password: " . ($passwordTest ? "BERHASIL" : "GAGAL") . "\n";
    
    // Tampilkan info akun
    echo "\n=== KREDENSIAL VERIFIKATOR ===\n";
    echo "Email: verifikator@ppdb.com\n";
    echo "Password: verifikator123\n";
    echo "Role: verifikator\n";
    echo "Hash: " . $verifikator->password . "\n";
    
    echo "\n=== SELESAI ===\n";
    echo "Silakan login dengan kredensial di atas\n";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}