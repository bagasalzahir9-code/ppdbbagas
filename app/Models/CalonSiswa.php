<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CalonSiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'calon_siswa';
    protected $guard = 'calon_siswa';

    protected $fillable = [
        'nama_lengkap', 'email', 'password', 'nik', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'no_hp', 'asal_sekolah', 'jurusan_pilihan', 'status',
        'berkas_ijazah', 'berkas_raport', 'berkas_kip', 'berkas_kks', 'berkas_akte', 'berkas_kk',
        'nominal_pembayaran', 'bukti_pembayaran', 'tanggal_pembayaran'
    ];

    protected $hidden = ['password'];
    
    protected $casts = [
        'password' => 'hashed',
        'tanggal_lahir' => 'date',
        'tanggal_pembayaran' => 'datetime',
        'nominal_pembayaran' => 'decimal:2'
    ];
    
    // Helper methods
    public function getStatusLabelAttribute()
    {
        $labels = [
            'draft' => 'Draft',
            'dikirim' => 'Dikirim',
            'verifikasi_admin' => 'Verifikasi Admin',
            'menunggu_pembayaran' => 'Menunggu Pembayaran',
            'terbayar' => 'Terbayar',
            'verifikasi_keuangan' => 'Verifikasi Keuangan',
            'lulus' => 'Lulus',
            'tidak_lulus' => 'Tidak Lulus',
            'cadangan' => 'Cadangan'
        ];
        return $labels[$this->status] ?? 'Unknown';
    }
    
    public function hasUploadedAllRequiredFiles()
    {
        return $this->berkas_ijazah && $this->berkas_raport && $this->berkas_kk;
    }
    
    public function getUploadProgress()
    {
        $required = ['berkas_ijazah', 'berkas_raport', 'berkas_kk'];
        $optional = ['berkas_kip', 'berkas_kks', 'berkas_akte'];
        
        $uploadedRequired = 0;
        $uploadedOptional = 0;
        
        foreach ($required as $field) {
            if ($this->$field) $uploadedRequired++;
        }
        
        foreach ($optional as $field) {
            if ($this->$field) $uploadedOptional++;
        }
        
        return [
            'required' => $uploadedRequired,
            'total_required' => count($required),
            'optional' => $uploadedOptional,
            'total_optional' => count($optional),
            'percentage' => ($uploadedRequired + $uploadedOptional) / (count($required) + count($optional)) * 100
        ];
    }
}