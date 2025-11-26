<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    
    protected $fillable = [
        'user_id', 'tanggal_daftar', 'no_pendaftaran', 'gelombang_id', 
        'jurusan_id', 'status', 'user_verifikasi_adm', 'tgl_verifikasi_adm',
        'user_verifikasi_payment', 'tgl_verifikasi_payment'
    ];

    protected $casts = [
        'tanggal_daftar' => 'datetime',
        'tgl_verifikasi_adm' => 'datetime',
        'tgl_verifikasi_payment' => 'datetime'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id');
    }

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function dataSiswa()
    {
        return $this->hasOne(PendaftarDataSiswa::class);
    }

    public function dataOrtu()
    {
        return $this->hasOne(PendaftarDataOrtu::class);
    }

    public function asalSekolah()
    {
        return $this->hasOne(PendaftarAsalSekolah::class);
    }

    public function berkas()
    {
        return $this->hasMany(PendaftarBerkas::class);
    }
}