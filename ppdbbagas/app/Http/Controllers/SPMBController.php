<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Jurusan;

class SPMBController extends Controller
{
    // 1. Registrasi Akun
    public function showRegister()
    {
        return view('spmb.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:calon_siswa',
            'password' => 'required|min:6'
        ]);

        CalonSiswa::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('spmb.login')->with('success', 'Akun berhasil dibuat');
    }

    // Login
    public function showLogin()
    {
        return view('spmb.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('calon_siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('spmb.dashboard'));
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }

    // Dashboard
    public function dashboard()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.dashboard', compact('calonSiswa'));
    }

    // 2. Formulir Pendaftaran
    public function showForm()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        $jurusan = Jurusan::where('aktif', true)->get();
        return view('spmb.form', compact('calonSiswa', 'jurusan'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|digits:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'no_hp' => 'required',
            'asal_sekolah' => 'required',
            'jurusan_pilihan' => 'required'
        ]);

        $calonSiswa = Auth::guard('calon_siswa')->user();
        $calonSiswa->update($request->all());

        return redirect()->route('spmb.upload')->with('success', 'Data berhasil disimpan');
    }

    // 3. Upload Berkas
    public function showUpload()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.upload', compact('calonSiswa'));
    }

    public function uploadBerkas(Request $request)
    {
        $request->validate([
            'berkas_ijazah' => 'required|file|mimes:pdf,jpg,jpeg|max:2048',
            'berkas_raport' => 'required|file|mimes:pdf,jpg,jpeg|max:2048',
            'berkas_kk' => 'required|file|mimes:pdf,jpg,jpeg|max:2048'
        ]);

        $calonSiswa = Auth::guard('calon_siswa')->user();
        $data = [];

        foreach (['berkas_ijazah', 'berkas_raport', 'berkas_kk', 'berkas_kip', 'berkas_kks', 'berkas_akte'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('berkas', 'public');
            }
        }

        $data['status'] = 'dikirim';
        $calonSiswa->update($data);

        return redirect()->route('spmb.status')->with('success', 'Berkas berhasil diupload');
    }

    // 4. Status Pendaftaran
    public function showStatus()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.status', compact('calonSiswa'));
    }

    // 5. Pembayaran
    public function showPembayaran()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        return view('spmb.pembayaran', compact('calonSiswa'));
    }

    public function uploadBuktiPembayaran(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg|max:2048'
        ]);

        $calonSiswa = Auth::guard('calon_siswa')->user();
        $buktiPath = $request->file('bukti_pembayaran')->store('pembayaran', 'public');

        $calonSiswa->update([
            'bukti_pembayaran' => $buktiPath,
            'tanggal_pembayaran' => now(),
            'status' => 'terbayar'
        ]);

        return redirect()->route('spmb.status')->with('success', 'Bukti pembayaran berhasil diupload');
    }

    public function cetakKartu()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        
        if (!$calonSiswa->nama_lengkap) {
            return redirect()->route('spmb.form')->with('error', 'Lengkapi data terlebih dahulu');
        }

        return view('spmb.kartu-cetak', compact('calonSiswa'));
    }

    public function cetakBuktiPembayaran()
    {
        $calonSiswa = Auth::guard('calon_siswa')->user();
        
        if (!$calonSiswa->bukti_pembayaran) {
            return redirect()->route('spmb.pembayaran')->with('error', 'Belum ada bukti pembayaran');
        }

        return view('spmb.bukti-bayar-cetak', compact('calonSiswa'));
    }

    public function logout()
    {
        Auth::guard('calon_siswa')->logout();
        return redirect()->route('spmb.login');
    }
}