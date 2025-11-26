<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

Route::get('/debug-keuangan', function () {
    $user = Admin::where('email', 'keuangan@test.com')->first();
    
    if (!$user) {
        return 'User tidak ditemukan';
    }
    
    echo "User ditemukan: " . $user->name . "<br>";
    echo "Email: " . $user->email . "<br>";
    echo "Role: " . $user->role . "<br>";
    
    // Test login
    if (Auth::guard('admin')->attempt(['email' => 'keuangan@test.com', 'password' => 'keuangan123'])) {
        echo "Login berhasil!<br>";
        echo "<a href='" . route('keuangan.dashboard') . "'>Ke Dashboard</a>";
    } else {
        echo "Login gagal!";
    }
});

Route::get('/test-dashboard', function () {
    try {
        $controller = new App\Http\Controllers\KeuanganController();
        return $controller->dashboard();
    } catch (Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});