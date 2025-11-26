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
        return redirect()->route('admin.master-spmb');
    }

    public function masterSpmb()
    {
        $jurusan = \App\Models\Jurusan::all();
        $gelombang = \App\Models\Gelombang::all();
        $admin = \App\Models\Admin::all();
        
        return view('admin.master-spmb', compact('jurusan', 'gelombang', 'admin'));
    }

    public function monitoring()
    {
        $pendaftar = CalonSiswa::all();
        return view('admin.monitoring', compact('pendaftar'));
    }

    public function peta()
    {
        $pendaftar = \App\Models\PendaftarDataSiswa::with(['pendaftar.jurusan', 'wilayah'])
            ->whereNotNull('lat')
            ->whereNotNull('lng')
            ->get();
        
        $markers = $pendaftar->map(function($data) {
            return [
                'lat' => (float) $data->lat,
                'lng' => (float) $data->lng,
                'nama' => $data->nama,
                'jurusan' => $data->pendaftar->jurusan->nama_jurusan ?? '',
                'status' => $data->pendaftar->status,
                'wilayah' => $data->wilayah->kecamatan ?? ''
            ];
        });
        
        $statistik = [
            'total' => $pendaftar->count(),
            'per_jurusan' => \App\Models\Pendaftar::with('jurusan')
                ->selectRaw('jurusan_id, count(*) as total')
                ->groupBy('jurusan_id')
                ->get(),
            'per_kecamatan' => \App\Models\PendaftarDataSiswa::with('wilayah')
                ->selectRaw('wilayah_id, count(*) as total')
                ->groupBy('wilayah_id')
                ->limit(10)
                ->get()
        ];
        
        return view('admin.peta', compact('markers', 'statistik'));
    }

    public function laporan()
    {
        $pendaftar = CalonSiswa::orderBy('created_at', 'desc')->get();
        return view('admin.laporan', compact('pendaftar'));
    }

    public function exportPdf(Request $request)
    {
        $query = CalonSiswa::query();
        
        // Apply filters
        if ($request->major && $request->major !== 'all') {
            $query->where('jurusan_pilihan', $request->major);
        }
        
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        $pendaftar = $query->orderBy('created_at', 'desc')->get();
        
        return view('admin.laporan-pdf', compact('pendaftar'));
    }

    public function exportExcel(Request $request)
    {
        $query = CalonSiswa::query();
        
        // Apply filters
        if ($request->major && $request->major !== 'all') {
            $query->where('jurusan_pilihan', $request->major);
        }
        
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        $pendaftar = $query->orderBy('created_at', 'desc')->get();
        
        $csv = "No,Nama,Email,Jurusan,Status,Tanggal Daftar\n";
        foreach ($pendaftar as $index => $p) {
            $csv .= ($index + 1) . "," . 
                    ($p->nama_lengkap ?? '') . "," . 
                    ($p->email ?? '') . "," . 
                    ($p->jurusan_pilihan ?? '') . "," . 
                    ($p->status ?? 'draft') . "," . 
                    ($p->created_at ? $p->created_at->format('Y-m-d') : '') . "\n";
        }
        
        $filename = 'laporan-ppdb-' . date('Y-m-d') . '.csv';
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function exportCsv(Request $request)
    {
        return $this->exportExcel($request);
    }
    
    public function viewFile($id, $type)
    {
        $siswa = CalonSiswa::findOrFail($id);
        
        $allowedTypes = ['berkas_ijazah', 'berkas_raport', 'berkas_kk', 'berkas_kip', 'berkas_kks', 'berkas_akte', 'bukti_pembayaran'];
        
        if (!in_array($type, $allowedTypes)) {
            abort(404, 'File type not allowed');
        }
        
        $filePath = $siswa->$type;
        
        if (!$filePath || !file_exists(public_path($filePath))) {
            abort(404, 'File not found');
        }
        
        return response()->file(public_path($filePath));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}