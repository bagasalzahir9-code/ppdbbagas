<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Fix data types in pendaftar table to match foreign key references
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('gelombang_id')->change();
            $table->unsignedBigInteger('jurusan_id')->change();
        });

        // Fix data types in pendaftar_data_siswa table
        Schema::table('pendaftar_data_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('wilayah_id')->change();
        });

        // Fix data types in log_aktivitas table
        Schema::table('log_aktivitas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });

        // Now add the foreign key constraints
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('pengguna')->onDelete('cascade');
            $table->foreign('gelombang_id')->references('id')->on('gelombang')->onDelete('cascade');
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade');
            $table->index('status');
        });

        Schema::table('pendaftar_data_siswa', function (Blueprint $table) {
            $table->foreign('wilayah_id')->references('id')->on('wilayah')->onDelete('cascade');
        });

        Schema::table('pendaftar_berkas', function (Blueprint $table) {
            $table->index(['pendaftar_id', 'jenis']);
        });

        Schema::table('log_aktivitas', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('pengguna')->onDelete('cascade');
            $table->index(['user_id', 'waktu']);
        });
    }

    public function down(): void
    {
        Schema::table('log_aktivitas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropIndex(['user_id', 'waktu']);
        });

        Schema::table('pendaftar_berkas', function (Blueprint $table) {
            $table->dropIndex(['pendaftar_id', 'jenis']);
        });

        Schema::table('pendaftar_data_siswa', function (Blueprint $table) {
            $table->dropForeign(['wilayah_id']);
        });

        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['gelombang_id']);
            $table->dropForeign(['jurusan_id']);
            $table->dropIndex(['status']);
        });
    }
};