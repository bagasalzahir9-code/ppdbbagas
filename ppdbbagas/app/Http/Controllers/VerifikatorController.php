<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;

class VerifikatorController extends Controller
{
    public function dashboard()
    {
        $pendingVerifikasi = CalonSiswa::whereNull('status')->count();
        $terverifikasi = CalonSiswa::whereNotNull('status')->count();
        
        return view('verifikator.dashboard', compact('pendingVerifikasi', 'terverifikasi'));
    }

    public function verifikasi()
    {
        $pendaftar = CalonSiswa::whereNull('status')->get();
        return view('verifikator.verifikasi', compact('pendaftar'));
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        $siswa->update(['status' => $request->status]);
        
        return back()->with('success', 'Status verifikasi berhasil diupdate');
    }
}