<?php

use Illuminate\Support\Facades\Route;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

Route::get('/reset-verifikator', function () {
    try {
        // Hapus semua akun verifikator yang ada
        Admin::where('role', 'verifikator')->delete();
        
        // Buat akun verifikator baru
        $verifikator = Admin::create([
            'name' => 'Verifikator PPDB',
            'email' => 'verifikator@ppdb.com',
            'password' => Hash::make('verifikator123'),
            'role' => 'verifikator'
        ]);
        
        // Test password hash
        $passwordCheck = Hash::check('verifikator123', $verifikator->password);
        
        // Test login attempt
        $loginAttempt = Auth::guard('admin')->attempt([
            'email' => 'verifikator@ppdb.com',
            'password' => 'verifikator123'
        ]);
        
        if ($loginAttempt) {
            Auth::guard('admin')->logout();
        }
        
        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Akun verifikator berhasil direset',
            'data' => [
                'id' => $verifikator->id,
                'name' => $verifikator->name,
                'email' => $verifikator->email,
                'role' => $verifikator->role,
                'password_hash_test' => $passwordCheck ? 'VALID' : 'INVALID',
                'login_test' => $loginAttempt ? 'SUCCESS' : 'FAILED'
            ],
            'credentials' => [
                'email' => 'verifikator@ppdb.com',
                'password' => 'verifikator123'
            ],
            'next_step' => 'Silakan login dengan kredensial di atas'
        ]);
        
    } catch (Exception $e) {
        return response()->json([
            'status' => 'ERROR',
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
    }
});

Route::get('/check-verifikator', function () {
    $verifikator = Admin::where('email', 'verifikator@ppdb.com')->first();
    
    if (!$verifikator) {
        return response()->json([
            'status' => 'NOT_FOUND',
            'message' => 'Akun verifikator tidak ditemukan'
        ]);
    }
    
    $passwordTest = Hash::check('verifikator123', $verifikator->password);
    
    return response()->json([
        'status' => 'FOUND',
        'data' => [
            'id' => $verifikator->id,
            'name' => $verifikator->name,
            'email' => $verifikator->email,
            'role' => $verifikator->role,
            'password_test' => $passwordTest ? 'VALID' : 'INVALID',
            'created_at' => $verifikator->created_at
        ]
    ]);
});