<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KepalaSekolahController;

// Include debug routes
include __DIR__ . '/debug.php';
include __DIR__ . '/debug-verifikator.php';
include __DIR__ . '/fix-verifikator.php';
include __DIR__ . '/reset-verifikator.php';

Route::get('/', function () {
    return view('welcome-spmb');
});

Route::get('/test-connections', function () {
    return view('test-connections');
});

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::get('/test-login', function () {
    return view('test-login');
});

Route::get('/login-kepsek', function () {
    if (Auth::guard('admin')->attempt(['email' => 'kepsek@test.com', 'password' => 'kepsek123'])) {
        return redirect()->route('kepala.dashboard');
    }
    return 'Login gagal';
});

Route::get('/login-verifikator', function () {
    if (Auth::guard('admin')->attempt(['email' => 'verifikator@test.com', 'password' => 'verif123'])) {
        return redirect()->route('verifikator.dashboard');
    }
    return 'Login gagal';
});

Route::get('/login-admin', function () {
    if (Auth::guard('admin')->attempt(['email' => 'admin@test.com', 'password' => 'admin123'])) {
        return redirect()->route('admin.dashboard');
    }
    return 'Login gagal';
});

Route::get('/login-keuangan', function () {
    try {
        $user = App\Models\Admin::where('email', 'keuangan@test.com')->where('role', 'keuangan')->first();
        
        if (!$user) {
            return 'User keuangan tidak ditemukan';
        }
        
        Auth::guard('admin')->login($user);
        
        if (Auth::guard('admin')->check()) {
            return redirect()->route('keuangan.dashboard');
        } else {
            return 'Login berhasil tapi session gagal';
        }
    } catch (Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/login-siswa', function () {
    $siswa = App\Models\CalonSiswa::where('email', 'siswa@test.com')->first();
    if ($siswa) {
        Auth::guard('calon_siswa')->login($siswa);
        return redirect()->route('spmb.dashboard');
    }
    return 'Siswa tidak ditemukan';
});

Route::get('/login-ahmad', function () {
    if (Auth::guard('calon_siswa')->attempt(['email' => 'ahmad@gmail.com', 'password' => 'password'])) {
        return redirect()->route('spmb.dashboard');
    }
    return 'Login gagal';
});

Route::get('/login-siswa-baru', function () {
    $siswa = App\Models\CalonSiswa::where('email', 'siswa123@test.com')->first();
    if ($siswa) {
        Auth::guard('calon_siswa')->login($siswa);
        return redirect()->route('spmb.dashboard');
    }
    return 'Siswa tidak ditemukan';
});

Route::get('/login-pendaftar', function () {
    $user = App\Models\Pengguna::where('email', 'pendaftar@test.com')->where('role', 'pendaftar')->first();
    if ($user && Hash::check('pendaftar123', $user->password_hash)) {
        // Login berhasil - redirect ke dashboard pendaftar
        return 'Login berhasil! Email: pendaftar@test.com, Password: pendaftar123';
    }
    return 'Login pendaftar gagal';
});

// Routes untuk Calon Siswa
Route::prefix('spmb')->group(function () {
    Route::get('login', [CalonSiswaController::class, 'login'])->name('spmb.login');
    Route::post('login', [CalonSiswaController::class, 'authenticate']);
    Route::get('register', [CalonSiswaController::class, 'register'])->name('spmb.register');
    Route::post('register', [CalonSiswaController::class, 'store']);
    
    Route::middleware('auth:calon_siswa')->group(function () {
        Route::get('dashboard', [CalonSiswaController::class, 'dashboard'])->name('spmb.dashboard');
        Route::get('formulir', [CalonSiswaController::class, 'formulir'])->name('spmb.formulir');
        Route::get('upload', [CalonSiswaController::class, 'upload'])->name('spmb.upload');
        Route::get('pembayaran', [CalonSiswaController::class, 'pembayaran'])->name('spmb.pembayaran');
        Route::get('status', [CalonSiswaController::class, 'status'])->name('spmb.status');
        Route::get('cetak', [CalonSiswaController::class, 'cetak'])->name('spmb.cetak');
        Route::get('kartu/cetak', [CalonSiswaController::class, 'kartuCetak'])->name('spmb.kartu.cetak');
        Route::get('bukti-bayar/cetak', [CalonSiswaController::class, 'buktiBayarCetak'])->name('spmb.bukti-bayar.cetak');
        Route::get('notifikasi', [CalonSiswaController::class, 'notifikasi'])->name('spmb.notifikasi');
        Route::post('logout', [CalonSiswaController::class, 'logout'])->name('spmb.logout');
    });
});

// Routes untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminController::class, 'authenticate']);
    
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('master', [AdminController::class, 'master'])->name('admin.master');
        Route::get('monitoring', [AdminController::class, 'monitoring'])->name('admin.monitoring');
        Route::get('peta', [AdminController::class, 'peta'])->name('admin.peta');
        Route::get('laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});

// Routes untuk Verifikator
Route::middleware('auth:admin')->prefix('verifikator')->group(function () {
    Route::get('dashboard', [VerifikatorController::class, 'dashboard'])->name('verifikator.dashboard');
    Route::get('verifikasi', [VerifikatorController::class, 'verifikasi'])->name('verifikator.verifikasi');

    Route::put('verifikasi/{id}', [VerifikatorController::class, 'updateVerifikasi'])->name('verifikator.update');
});

// Routes untuk Keuangan
Route::middleware('auth:admin')->prefix('keuangan')->group(function () {
    Route::get('dashboard', [KeuanganController::class, 'dashboard'])->name('keuangan.dashboard');
    Route::get('pembayaran', [KeuanganController::class, 'pembayaran'])->name('keuangan.pembayaran');
    Route::get('verifikasi-pembayaran', [KeuanganController::class, 'verifikasiPembayaran'])->name('keuangan.verifikasi-pembayaran');
    Route::patch('verifikasi/{id}', [KeuanganController::class, 'verifikasi'])->name('keuangan.verifikasi');
});

// Routes untuk Kepala Sekolah
Route::middleware('auth:admin')->prefix('kepala')->group(function () {
    Route::get('dashboard', [KepalaSekolahController::class, 'dashboard'])->name('kepala.dashboard');
});