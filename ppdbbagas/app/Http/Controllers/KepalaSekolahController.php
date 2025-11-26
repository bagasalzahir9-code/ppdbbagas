<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;

class KepalaSekolahController extends Controller
{
    public function dashboard()
    {
        $totalPendaftar = CalonSiswa::count();
        $terverifikasi = CalonSiswa::whereNotNull('status')->count();
        $lunas = CalonSiswa::whereNotNull('tanggal_pembayaran')->count();
        $persentaseVerifikasi = $totalPendaftar > 0 ? round(($terverifikasi / $totalPendaftar) * 100, 2) : 0;
        $persentasePembayaran = $totalPendaftar > 0 ? round(($lunas / $totalPendaftar) * 100, 2) : 0;
        
        return view('kepala.dashboard', compact(
            'totalPendaftar', 'terverifikasi', 'lunas', 
            'persentaseVerifikasi', 'persentasePembayaran'
        ));
    }
}