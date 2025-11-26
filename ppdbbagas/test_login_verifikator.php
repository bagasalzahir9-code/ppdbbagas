<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

try {
    echo "=== TEST LOGIN VERIFIKATOR ===\n\n";
    
    // Cek akun verifikator
    $verifikator = Admin::where('email', 'verifikator@ppdb.com')->first();
    
    if (!$verifikator) {
        echo "ERROR: Akun verifikator tidak ditemukan!\n";
        exit;
    }
    
    echo "Akun ditemukan:\n";
    echo "ID: " . $verifikator->id . "\n";
    echo "Name: " . $verifikator->name . "\n";
    echo "Email: " . $verifikator->email . "\n";
    echo "Role: " . $verifikator->role . "\n";
    
    // Test password manual
    $passwordTest = Hash::check('verifikator123', $verifikator->password);
    echo "Password test: " . ($passwordTest ? "VALID" : "INVALID") . "\n";
    
    // Test login attempt
    $credentials = [
        'email' => 'verifikator@ppdb.com',
        'password' => 'verifikator123'
    ];
    
    $loginAttempt = Auth::guard('admin')->attempt($credentials);
    echo "Login attempt: " . ($loginAttempt ? "SUCCESS" : "FAILED") . "\n";
    
    if ($loginAttempt) {
        $user = Auth::guard('admin')->user();
        echo "Logged in user role: " . $user->role . "\n";
        Auth::guard('admin')->logout();
    }
    
    echo "\n=== HASIL ===\n";
    if ($passwordTest && $loginAttempt) {
        echo "✓ Login verifikator BERHASIL!\n";
        echo "Gunakan kredensial:\n";
        echo "Email: verifikator@ppdb.com\n";
        echo "Password: verifikator123\n";
    } else {
        echo "✗ Ada masalah dengan login verifikator\n";
    }
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}