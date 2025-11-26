<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller
{
    public function dashboard()
    {
        // Get payment statistics from CalonSiswa
        $totalPendapatan = CalonSiswa::whereIn('status', ['terbayar', 'verifikasi_keuangan', 'lulus'])
            ->sum('nominal_pembayaran');
        
        $totalPending = CalonSiswa::where('status', 'menunggu_pembayaran')
            ->sum('nominal_pembayaran');
        
        $totalSiswa = CalonSiswa::count();
        $siswaLunas = CalonSiswa::whereIn('status', ['terbayar', 'verifikasi_keuangan', 'lulus'])->count();
        
        $pendapatanBulan = CalonSiswa::whereIn('status', ['terbayar', 'verifikasi_keuangan', 'lulus'])
            ->whereMonth('tanggal_pembayaran', now()->month)
            ->sum('nominal_pembayaran');
            
        $pembayaranTerbaru = CalonSiswa::whereNotNull('bukti_pembayaran')
            ->orderBy('tanggal_pembayaran', 'desc')
            ->limit(10)
            ->get();
            
        // Statistics by major (jurusan)
        $statistikJenis = CalonSiswa::whereIn('status', ['terbayar', 'verifikasi_keuangan', 'lulus'])
            ->select('jurusan_pilihan', DB::raw('SUM(nominal_pembayaran) as total'))
            ->groupBy('jurusan_pilihan')
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
        $pembayaran = CalonSiswa::whereNotNull('bukti_pembayaran')
            ->orderBy('tanggal_pembayaran', 'desc')
            ->paginate(20);
        return view('keuangan.verifikasi-pembayaran', compact('pembayaran'));
    }

    public function verifikasiPembayaran()
    {
        $pembayaran = CalonSiswa::whereIn('status', ['menunggu_pembayaran', 'terbayar'])
            ->whereNotNull('bukti_pembayaran')
            ->orderBy('tanggal_pembayaran', 'desc')
            ->get();
            
        return view('keuangan.verifikasi-pembayaran', compact('pembayaran'));
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:approve,reject',
            'catatan' => 'nullable|string|max:500'
        ]);

        $siswa = CalonSiswa::findOrFail($id);
        
        if ($request->action === 'approve') {
            $siswa->update([
                'status' => 'terbayar'
            ]);
            $message = 'Pembayaran berhasil diverifikasi';
        } else {
            $siswa->update([
                'status' => 'verifikasi_admin' // Back to previous status
            ]);
            $message = 'Pembayaran ditolak';
        }
        
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function viewFile($id, $type)
    {
        $siswa = CalonSiswa::findOrFail($id);
        
        if ($type === 'bukti_pembayaran' && $siswa->bukti_pembayaran) {
            // Handle both full path and filename only
            $filename = $siswa->bukti_pembayaran;
            if (strpos($filename, 'uploads/pembayaran/') === 0) {
                $filePath = public_path($filename);
            } else {
                $filePath = public_path('uploads/pembayaran/' . $filename);
            }
            
            if (file_exists($filePath)) {
                return response()->file($filePath);
            }
        }
        
        abort(404, 'File tidak ditemukan');
    }
}