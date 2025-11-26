<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calon_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_lengkap')->nullable();
            $table->string('nik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('jurusan_pilihan')->nullable();
            $table->enum('status', ['draft', 'dikirim', 'verifikasi_admin', 'menunggu_pembayaran', 'terbayar', 'verifikasi_keuangan', 'lulus', 'tidak_lulus', 'cadangan'])->default('draft');
            $table->string('berkas_ijazah')->nullable();
            $table->string('berkas_raport')->nullable();
            $table->string('berkas_kip')->nullable();
            $table->string('berkas_kks')->nullable();
            $table->string('berkas_akte')->nullable();
            $table->string('berkas_kk')->nullable();
            $table->decimal('nominal_pembayaran', 10, 2)->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamp('tanggal_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calon_siswa');
    }
};