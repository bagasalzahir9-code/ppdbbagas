<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    use HasFactory;

    protected $table = 'gelombang';
    protected $fillable = ['nama_gelombang', 'tanggal_mulai', 'tanggal_selesai', 'biaya_daftar', 'aktif'];
    protected $casts = ['tanggal_mulai' => 'date', 'tanggal_selesai' => 'date'];
}