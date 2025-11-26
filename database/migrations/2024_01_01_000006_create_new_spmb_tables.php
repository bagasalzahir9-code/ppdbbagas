<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->datetime('tanggal_daftar');
            $table->string('no_pendaftaran', 20)->unique();
            $table->integer('gelombang_id');
            $table->integer('jurusan_id');
            $table->enum('status', ['SUBMIT', 'ADM_PASS', 'ADM_REJECT', 'PAID']);
            $table->string('user_verifikasi_adm', 100)->nullable();
            $table->datetime('tgl_verifikasi_adm')->nullable();
            $table->string('user_verifikasi_payment', 100)->nullable();
            $table->datetime('tgl_verifikasi_payment')->nullable();
            $table->timestamps();
        });

        Schema::create('pendaftar_data_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftar_id')->primary();
            $table->string('nik', 20);
            $table->string('nisn', 20);
            $table->string('nama', 120);
            $table->enum('jk', ['L', 'P']);
            $table->string('tmp_lahir', 60);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->integer('wilayah_id');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->foreign('pendaftar_id')->references('id')->on('pendaftar');
        });

        Schema::create('pendaftar_data_ortu', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftar_id')->primary();
            $table->string('nama_ayah', 120);
            $table->string('pekerjaan_ayah', 100);
            $table->string('hp_ayah', 20);
            $table->string('nama_ibu', 120);
            $table->string('pekerjaan_ibu', 100);
            $table->string('hp_ibu', 20);
            $table->string('wali_nama', 120)->nullable();
            $table->string('wali_hp', 20)->nullable();
            $table->foreign('pendaftar_id')->references('id')->on('pendaftar');
        });

        Schema::create('pendaftar_asal_sekolah', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftar_id')->primary();
            $table->string('npsn', 20);
            $table->string('nama_sekolah', 150);
            $table->string('kabupaten', 100);
            $table->decimal('nilai_rata', 5, 2);
            $table->foreign('pendaftar_id')->references('id')->on('pendaftar');
        });

        Schema::create('pendaftar_berkas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftar_id');
            $table->enum('jenis', ['IJAZAH', 'RAPOR', 'KIP', 'KKS', 'AKTA', 'KK', 'LAINNYA']);
            $table->string('nama_file', 255);
            $table->string('url', 255);
            $table->integer('ukuran_kb');
            $table->tinyInteger('valid');
            $table->string('catatan', 255)->nullable();
            $table->foreign('pendaftar_id')->references('id')->on('pendaftar');
        });

        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('aksi', 100);
            $table->string('objek', 100);
            $table->json('objek_data');
            $table->datetime('waktu');
            $table->string('ip', 45);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
        Schema::dropIfExists('pendaftar_berkas');
        Schema::dropIfExists('pendaftar_asal_sekolah');
        Schema::dropIfExists('pendaftar_data_ortu');
        Schema::dropIfExists('pendaftar_data_siswa');
        Schema::dropIfExists('pendaftar');
    }
};