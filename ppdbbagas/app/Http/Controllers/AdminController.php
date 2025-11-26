<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CalonSiswa;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            
            switch($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'verifikator':
                    return redirect()->route('verifikator.dashboard');

                case 'keuangan':
                    return redirect()->route('keuangan.dashboard');
                case 'kepala_sekolah':
                    return redirect()->route('kepala.dashboard');
                default:
                    return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Login gagal']);
    }

    public function dashboard()
    {
        $totalPendaftar = CalonSiswa::count();
        $pendingVerifikasi = CalonSiswa::whereNull('status')->count();
        $terverifikasi = CalonSiswa::whereNotNull('status')->count();
        
        return view('admin.dashboard', compact('totalPendaftar', 'pendingVerifikasi', 'terverifikasi'));
    }

    public function master()
    {
        $jurusan = \DB::table('jurusan')->get();
        return view('admin.master', compact('jurusan'));
    }

    public function monitoring()
    {
        $pendaftar = CalonSiswa::all();
        return view('admin.monitoring', compact('pendaftar'));
    }

    public function peta()
    {
        $pendaftar = CalonSiswa::all(['nama_lengkap', 'jurusan_pilihan', 'status']);
        
        $statistik = [
            'total' => CalonSiswa::count(),
            'per_jurusan' => CalonSiswa::selectRaw('jurusan_pilihan, count(*) as total')
                                     ->whereNotNull('jurusan_pilihan')
                                     ->groupBy('jurusan_pilihan')
                                     ->get(),
            'per_kecamatan' => [
                (object)['kecamatan' => 'Jakarta Pusat', 'total' => 15],
                (object)['kecamatan' => 'Jakarta Selatan', 'total' => 12],
                (object)['kecamatan' => 'Jakarta Barat', 'total' => 8],
                (object)['kecamatan' => 'Jakarta Utara', 'total' => 6]
            ]
        ];
        
        return view('admin.peta', compact('pendaftar', 'statistik'));
    }

    public function laporan()
    {
        $pendaftar = CalonSiswa::orderBy('created_at', 'desc')->get();
        return view('admin.laporan', compact('pendaftar'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}