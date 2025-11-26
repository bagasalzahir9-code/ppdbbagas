<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class SistemController extends Controller
{
    public function dashboard()
    {
        $total_notifikasi = Notifikasi::count();
        $notifikasi_terkirim = Notifikasi::where('terkirim', true)->count();
        
        return view('sistem.dashboard', compact('total_notifikasi', 'notifikasi_terkirim'));
    }

    public function notifikasi()
    {
        $notifikasi = Notifikasi::with('calonSiswa')->orderBy('created_at', 'desc')->paginate(20);
        return view('sistem.notifikasi', compact('notifikasi'));
    }

    public function kirimNotifikasi(Request $request)
    {
        $request->validate([
            'calon_siswa_id' => 'required|exists:calon_siswa,id',
            'jenis' => 'required|in:email,sms,whatsapp',
            'judul' => 'required',
            'pesan' => 'required'
        ]);

        Notifikasi::create([
            'calon_siswa_id' => $request->calon_siswa_id,
            'jenis' => $request->jenis,
            'judul' => $request->judul,
            'pesan' => $request->pesan,
            'terkirim' => true,
            'tanggal_kirim' => now()
        ]);

        return back()->with('success', 'Notifikasi berhasil dikirim');
    }
}