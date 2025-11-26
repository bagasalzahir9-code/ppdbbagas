<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $fillable = ['calon_siswa_id', 'jenis', 'judul', 'pesan', 'terkirim', 'tanggal_kirim'];
    protected $casts = ['tanggal_kirim' => 'datetime'];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}