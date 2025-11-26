<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use Illuminate\Support\Facades\Auth;

class VerifikatorController extends Controller
{
    public function dashboard()
    {
        $pendingVerifikasi = CalonSiswa::whereIn('status', ['draft', 'dikirim'])->count();
        $terverifikasi = CalonSiswa::whereIn('status', ['verifikasi_admin', 'menunggu_pembayaran', 'terbayar', 'verifikasi_keuangan', 'lulus', 'tidak_lulus', 'cadangan'])->count();
        $ditolak = CalonSiswa::where('status', 'ditolak')->count();
        $total = CalonSiswa::count();
        
        return view('verifikator.dashboard', compact('pendingVerifikasi', 'terverifikasi', 'ditolak', 'total'));
    }

    public function verifikasi()
    {
        $pendaftar = CalonSiswa::whereIn('status', ['draft', 'dikirim', 'verifikasi_admin', 'menunggu_pembayaran'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('verifikator.verifikasi', compact('pendaftar'));
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:verified,rejected',
            'reason' => 'nullable|string'
        ]);

        $siswa = CalonSiswa::findOrFail($id);
        
        if ($request->status == 'verified') {
            $newStatus = 'verifikasi_admin';
        } else {
            $newStatus = 'ditolak';
        }
        
        $siswa->update([
            'status' => $newStatus
        ]);
        
        return back()->with('success', 'Status verifikasi berhasil diupdate');
    }

    public function updateHasilSeleksi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lulus,tidak_lulus,cadangan'
        ]);

        $siswa = CalonSiswa::findOrFail($id);
        $siswa->update(['status' => $request->status]);
        
        return back()->with('success', 'Hasil seleksi berhasil diupdate');
    }
    
    public function viewFile($id, $type)
    {
        $siswa = CalonSiswa::findOrFail($id);
        
        $allowedTypes = ['berkas_ijazah', 'berkas_raport', 'berkas_kk', 'berkas_kip', 'berkas_kks', 'berkas_akte'];
        
        if (!in_array($type, $allowedTypes)) {
            abort(404, 'File type not allowed');
        }
        
        $filePath = $siswa->$type;
        
        if (!$filePath || !file_exists(public_path($filePath))) {
            abort(404, 'File not found');
        }
        
        return response()->file(public_path($filePath));
    }
}