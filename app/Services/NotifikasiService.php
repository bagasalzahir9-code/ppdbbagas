<?php

namespace App\Services;

use App\Models\Notifikasi;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Mail;

class NotifikasiService
{
    public static function kirimNotifikasi($pendaftarId, $jenis, $judul, $pesan)
    {
        $pendaftar = Pendaftar::with('pengguna')->find($pendaftarId);
        if (!$pendaftar) return false;

        // Simpan ke database
        $notifikasi = Notifikasi::create([
            'calon_siswa_id' => $pendaftarId,
            'jenis' => $jenis,
            'judul' => $judul,
            'pesan' => $pesan,
            'terkirim' => false
        ]);

        // Kirim email
        if ($jenis === 'email') {
            try {
                // Simple email implementation
                $to = $pendaftar->pengguna->email;
                $subject = $judul;
                $message = $pesan;
                $headers = 'From: noreply@ppdb.com';
                
                if (mail($to, $subject, $message, $headers)) {
                    $notifikasi->update(['terkirim' => true, 'tanggal_kirim' => now()]);
                    return true;
                }
            } catch (\Exception $e) {
                // Log error
            }
        }

        return false;
    }

    public static function notifikasiStatusUpdate($pendaftar, $statusBaru)
    {
        $pesan = self::getPesanStatus($statusBaru);
        return self::kirimNotifikasi(
            $pendaftar->id,
            'email',
            'Update Status Pendaftaran',
            $pesan
        );
    }

    private static function getPesanStatus($status)
    {
        $messages = [
            'ADM_PASS' => 'Selamat! Berkas Anda telah diverifikasi dan dinyatakan LULUS. Silakan lakukan pembayaran.',
            'ADM_REJECT' => 'Maaf, berkas Anda belum memenuhi syarat. Silakan perbaiki dan kirim ulang.',
            'PAID' => 'Pembayaran Anda telah terverifikasi. Menunggu pengumuman hasil seleksi.',
            'LULUS' => 'SELAMAT! Anda DITERIMA di sekolah kami. Silakan lakukan daftar ulang.',
            'TIDAK_LULUS' => 'Maaf, Anda belum dapat diterima pada periode ini.',
            'CADANGAN' => 'Anda masuk dalam daftar CADANGAN. Kami akan menghubungi jika ada kuota tersedia.'
        ];
        return $messages[$status] ?? 'Status pendaftaran Anda telah diupdate.';
    }
}