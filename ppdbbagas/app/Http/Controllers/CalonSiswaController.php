<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CalonSiswa;

class CalonSiswaController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('calon_siswa')->attempt($credentials)) {
            return redirect()->route('spmb.dashboard');
        }

        return back()->withErrors(['email' => 'Login gagal']);
    }

    public function register()
    {
        return view('spmb.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:calon_siswa',
            'password' => 'required|min:6'
        ]);

        CalonSiswa::create([
            'nama_lengkap' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('spmb.login')->with('success', 'Registrasi berhasil');
    }

    public function dashboard()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.dashboard', compact('calonSiswa'));
    }

    public function formulir()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.formulir', compact('calonSiswa'));
    }

    public function upload()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.upload', compact('calonSiswa'));
    }

    public function pembayaran()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.pembayaran', compact('calonSiswa'));
    }

    public function status()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.status', compact('calonSiswa'));
    }

    public function cetak()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.cetak', compact('calonSiswa'));
    }

    public function kartuCetak()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.kartu-cetak', compact('calonSiswa'));
    }

    public function buktiBayarCetak()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.bukti-bayar-cetak', compact('calonSiswa'));
    }

    public function notifikasi()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.notifikasi', compact('calonSiswa'));
    }

    public function logout()
    {
        Auth::guard('calon_siswa')->logout();
        return redirect()->route('spmb.login');
    }
}