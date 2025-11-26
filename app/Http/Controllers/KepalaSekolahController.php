<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;

class KepalaSekolahController extends Controller
{
    public function dashboard()
    {
        $kpi = [
            'total_pendaftar' => \App\Models\Pendaftar::count(),
            'lulus_administrasi' => \App\Models\Pendaftar::where('status', 'ADM_PASS')->count(),
            'sudah_bayar' => \App\Models\Pendaftar::where('status', 'PAID')->count(),
            'diterima' => \App\Models\Pendaftar::where('status', 'LULUS')->count(),
            'cadangan' => \App\Models\Pendaftar::where('status', 'CADANGAN')->count(),
            'ditolak' => \App\Models\Pendaftar::whereIn('status', ['ADM_REJECT', 'TIDAK_LULUS'])->count()
        ];

        $tren_harian = \App\Models\Pendaftar::selectRaw('DATE(tanggal_daftar) as tanggal, COUNT(*) as jumlah')
            ->where('tanggal_daftar', '>=', now()->subDays(30))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $per_jurusan = \App\Models\Pendaftar::with('jurusan')
            ->selectRaw('jurusan_id, COUNT(*) as jumlah')
            ->groupBy('jurusan_id')
            ->get();

        $sebaran_wilayah = \App\Models\PendaftarDataSiswa::with('wilayah')
            ->selectRaw('wilayah_id, COUNT(*) as jumlah')
            ->groupBy('wilayah_id')
            ->limit(10)
            ->get();

        return view('kepala.dashboard', compact('kpi', 'tren_harian', 'per_jurusan', 'sebaran_wilayah'));
    }
}