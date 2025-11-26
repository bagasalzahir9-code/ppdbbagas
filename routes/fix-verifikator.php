<?php

use Illuminate\Support\Facades\Route;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

Route::get('/fix-verifikator', function () {
    try {
        // Delete existing verifikator if exists
        Admin::where('email', 'verifikator@ppdb.com')->delete();
        
        // Create new verifikator
        $verifikator = Admin::create([
            'name' => 'Verifikator PPDB',
            'email' => 'verifikator@ppdb.com',
            'password' => Hash::make('verifikator123'),
            'role' => 'verifikator'
        ]);
        
        // Test login
        $loginTest = Hash::check('verifikator123', $verifikator->password);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Verifikator account created and tested',
            'account' => [
                'id' => $verifikator->id,
                'name' => $verifikator->name,
                'email' => $verifikator->email,
                'role' => $verifikator->role,
                'password_test' => $loginTest ? 'PASS' : 'FAIL'
            ],
            'instructions' => [
                'email' => 'verifikator@ppdb.com',
                'password' => 'verifikator123',
                'login_url' => url('/admin/login')
            ]
        ]);
        
    } catch (Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
});

Route::get('/test-admin-login', function () {
    return view('admin.login');
});