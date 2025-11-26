<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update admin table untuk role baru
        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn('role');
        });
        
        Schema::table('admin', function (Blueprint $table) {
            $table->enum('role', ['admin', 'panitia', 'verifikator', 'keuangan', 'kepala_sekolah'])->default('panitia');
        });

        // Update calon_siswa table untuk data lokasi
        Schema::table('calon_siswa', function (Blueprint $table) {
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kode_pos')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
        });

        // Tabel untuk notifikasi
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_siswa_id');
            $table->enum('jenis', ['email', 'sms', 'whatsapp']);
            $table->string('judul');
            $table->text('pesan');
            $table->boolean('terkirim')->default(false);
            $table->timestamp('tanggal_kirim')->nullable();
            $table->timestamps();
            
            $table->foreign('calon_siswa_id')->references('id')->on('calon_siswa');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
        Schema::table('calon_siswa', function (Blueprint $table) {
            $table->dropColumn(['kecamatan', 'kelurahan', 'kode_pos', 'latitude', 'longitude']);
        });
    }
};