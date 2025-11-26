<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    public function infoPendaftaran()
    {
        $jurusan = Jurusan::where('aktif', true)->get();
        $total_pendaftar = CalonSiswa::count();
        
        return view('publik.info-pendaftaran', compact('jurusan', 'total_pendaftar'));
    }

    public function linkRegistrasi()
    {
        return redirect()->route('spmb.register');
    }
}