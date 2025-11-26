<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function dashboard()
    {
        $totalPendapatan = Pembayaran::where('status', 'lunas')->sum('jumlah');
        $totalPending = Pembayaran::where('status', 'pending')->sum('jumlah');
        $totalSiswa = Pendaftar::count();
        $siswaLunas = Pendaftar::where('status', 'PAID')->count();
        
        $pendapatanBulan = Pembayaran::where('status', 'lunas')
            ->whereMonth('tanggal_bayar', now()->month)
            ->sum('jumlah');
            
        $pembayaranTerbaru = Pembayaran::with(['pendaftar.dataSiswa'])
            ->whereHas('pendaftar')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
            
        $statistikJenis = Pembayaran::where('status', 'lunas')
            ->select('jenis_pembayaran', DB::raw('SUM(jumlah) as total'))
            ->groupBy('jenis_pembayaran')
            ->get();

        return view('keuangan.dashboard', compact(
            'totalPendapatan',
            'totalPending', 
            'totalSiswa',
            'siswaLunas',
            'pendapatanBulan',
            'pembayaranTerbaru',
            'statistikJenis'
        ));
    }

    public function pembayaran()
    {
        $pembayaran = Pembayaran::with(['pendaftar.dataSiswa'])
            ->whereHas('pendaftar')
            ->paginate(20);
        return view('keuangan.pembayaran', compact('pembayaran'));
    }

    public function verifikasiPembayaran()
    {
        return view('keuangan.verifikasi-pembayaran');
    }

    public function verifikasi(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'Status pembayaran berhasil diupdate');
    }
}