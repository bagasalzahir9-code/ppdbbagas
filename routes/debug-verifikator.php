<?php

use Illuminate\Support\Facades\Route;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

Route::get('/debug-verifikator', function () {
    // Check if verifikator exists
    $verifikator = Admin::where('email', 'verifikator@ppdb.com')->first();
    
    if (!$verifikator) {
        // Create verifikator if not exists
        $verifikator = Admin::create([
            'name' => 'Verifikator PPDB',
            'email' => 'verifikator@ppdb.com',
            'password' => Hash::make('verifikator123'),
            'role' => 'verifikator'
        ]);
        
        return response()->json([
            'status' => 'created',
            'message' => 'Verifikator account created successfully',
            'email' => 'verifikator@ppdb.com',
            'password' => 'verifikator123',
            'role' => 'verifikator'
        ]);
    }
    
    // Test password
    $passwordCheck = Hash::check('verifikator123', $verifikator->password);
    
    return response()->json([
        'status' => 'exists',
        'verifikator' => [
            'id' => $verifikator->id,
            'name' => $verifikator->name,
            'email' => $verifikator->email,
            'role' => $verifikator->role,
            'password_correct' => $passwordCheck
        ],
        'credentials' => [
            'email' => 'verifikator@ppdb.com',
            'password' => 'verifikator123'
        ]
    ]);
});

Route::get('/create-all-admins', function () {
    // Create all admin accounts
    $admins = [
        [
            'name' => 'Admin Panitia',
            'email' => 'admin@ppdb.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ],
        [
            'name' => 'Verifikator PPDB',
            'email' => 'verifikator@ppdb.com',
            'password' => Hash::make('verifikator123'),
            'role' => 'verifikator'
        ],
        [
            'name' => 'Staff Keuangan',
            'email' => 'keuangan@ppdb.com',
            'password' => Hash::make('keuangan123'),
            'role' => 'keuangan'
        ],
        [
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@ppdb.com',
            'password' => Hash::make('kepsek123'),
            'role' => 'kepala_sekolah'
        ]
    ];
    
    $created = [];
    foreach ($admins as $adminData) {
        $existing = Admin::where('email', $adminData['email'])->first();
        if (!$existing) {
            Admin::create($adminData);
            $created[] = $adminData['email'];
        }
    }
    
    return response()->json([
        'message' => 'Admin accounts processed',
        'created' => $created,
        'total_admins' => Admin::count()
    ]);
});