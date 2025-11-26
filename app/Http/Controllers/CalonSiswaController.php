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
        $jurusan = \App\Models\Jurusan::where('aktif', true)->get();
        $gelombang = \App\Models\Gelombang::where('aktif', true)->get();
        $wilayah = \App\Models\Wilayah::all();
        
        return view('spmb.formulir', compact('calonSiswa', 'jurusan', 'gelombang', 'wilayah'));
    }

    public function simpanFormulir(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:120',
            'nik' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:60',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'asal_sekolah' => 'required|string|max:100',
            'jurusan_pilihan' => 'required|string'
        ]);

        $user = Auth::guard('calon_siswa')->user();
        
        // Update data calon siswa
        $updateData = [
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'jurusan_pilihan' => $request->jurusan_pilihan
        ];
        
        // Set status based on action
        if ($request->action == 'submit') {
            $updateData['status'] = 'dikirim';
        } else {
            $updateData['status'] = 'draft';
        }
        
        $user->update($updateData);

        $message = $request->action == 'submit' ? 'Formulir berhasil dikirim' : 'Data berhasil disimpan sebagai draft';
        $nextRoute = $request->action == 'submit' ? 'spmb.upload' : 'spmb.formulir';
        
        return redirect()->route($nextRoute)->with('success', $message);
    }

    public function upload()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.upload', compact('calonSiswa'));
    }

    public function uploadStore(Request $request)
    {
        $request->validate([
            'berkas_ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_raport' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_kip' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_kks' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_akte' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::guard('calon_siswa')->user();
        $updateData = [];
        $uploadedFiles = [];

        // Ensure upload directory exists
        if (!file_exists(public_path('uploads/berkas'))) {
            mkdir(public_path('uploads/berkas'), 0755, true);
        }

        // Handle file uploads
        foreach (['berkas_ijazah', 'berkas_raport', 'berkas_kip', 'berkas_kks', 'berkas_akte', 'berkas_kk'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $user->id . '_' . $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                
                // Move file
                $file->move(public_path('uploads/berkas'), $filename);
                
                // Store path in database
                $updateData[$field] = 'uploads/berkas/' . $filename;
                $uploadedFiles[] = $field;
            }
        }

        if (!empty($updateData)) {
            $result = $user->update($updateData);
            
            // Debug log
            \Log::info('Upload berkas:', [
                'user_id' => $user->id,
                'files' => $uploadedFiles,
                'update_data' => $updateData,
                'update_result' => $result
            ]);
        }

        $message = !empty($uploadedFiles) ? 'Berkas berhasil diupload: ' . implode(', ', $uploadedFiles) : 'Tidak ada berkas yang diupload';
        return redirect()->route('spmb.upload')->with('success', $message);
    }

    public function pembayaran()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.pembayaran', compact('calonSiswa'));
    }

    public function pembayaranStore(Request $request)
    {
        $request->validate([
            'nominal_pembayaran' => 'required|numeric|min:0',
            'bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::guard('calon_siswa')->user();
        
        // Ensure upload directory exists
        if (!file_exists(public_path('uploads/pembayaran'))) {
            mkdir(public_path('uploads/pembayaran'), 0755, true);
        }
        
        // Handle bukti pembayaran upload
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = $user->id . '_bukti_pembayaran_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/pembayaran'), $filename);
            
            // Update status based on current status
            $newStatus = $user->status;
            if (in_array($user->status, ['draft', 'dikirim', 'verifikasi_admin'])) {
                $newStatus = 'menunggu_pembayaran';
            }
            
            $user->update([
                'nominal_pembayaran' => $request->nominal_pembayaran,
                'bukti_pembayaran' => 'uploads/pembayaran/' . $filename,
                'tanggal_pembayaran' => now(),
                'status' => $newStatus
            ]);
        }

        return redirect()->route('spmb.pembayaran')->with('success', 'Bukti pembayaran berhasil diupload');
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