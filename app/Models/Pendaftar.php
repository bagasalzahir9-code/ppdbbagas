<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    
    // Status constants
    const STATUS_SUBMIT = 'SUBMIT';
    const STATUS_ADM_PASS = 'ADM_PASS';
    const STATUS_ADM_REJECT = 'ADM_REJECT';
    const STATUS_PAID = 'PAID';
    const STATUS_LULUS = 'LULUS';
    const STATUS_TIDAK_LULUS = 'TIDAK_LULUS';
    const STATUS_CADANGAN = 'CADANGAN';
    
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

    // Status helper methods
    public static function getStatusOptions()
    {
        return [
            self::STATUS_SUBMIT => 'Dikirim',
            self::STATUS_ADM_PASS => 'Lulus Administrasi',
            self::STATUS_ADM_REJECT => 'Tolak Administrasi',
            self::STATUS_PAID => 'Terbayar',
            self::STATUS_LULUS => 'Lulus',
            self::STATUS_TIDAK_LULUS => 'Tidak Lulus',
            self::STATUS_CADANGAN => 'Cadangan'
        ];
    }

    public function getStatusLabelAttribute()
    {
        return self::getStatusOptions()[$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute()
    {
        $colors = [
            self::STATUS_SUBMIT => 'warning',
            self::STATUS_ADM_PASS => 'info',
            self::STATUS_ADM_REJECT => 'danger',
            self::STATUS_PAID => 'primary',
            self::STATUS_LULUS => 'success',
            self::STATUS_TIDAK_LULUS => 'danger',
            self::STATUS_CADANGAN => 'secondary'
        ];
        return $colors[$this->status] ?? 'secondary';
    }
}