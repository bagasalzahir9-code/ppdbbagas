<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    
    protected $fillable = [
        'pendaftar_id',
        'jenis_pembayaran',
        'jumlah',
        'tanggal_bayar',
        'status',
        'bukti_bayar',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah' => 'decimal:2'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}