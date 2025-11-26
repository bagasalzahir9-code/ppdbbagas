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
        'jenis_kelamin', 'alamat', 'no_hp', 'asal_sekolah', 'jurusan_pilihan', 'status'
    ];

    protected $hidden = ['password'];
    protected $casts = ['password' => 'hashed'];
}