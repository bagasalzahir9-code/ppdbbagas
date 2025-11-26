<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained('pendaftar');
            $table->enum('jenis_pembayaran', ['pendaftaran', 'daftar_ulang', 'spp']);
            $table->decimal('jumlah', 10, 2);
            $table->date('tanggal_bayar');
            $table->enum('status', ['pending', 'lunas', 'ditolak'])->default('pending');
            $table->string('bukti_bayar')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};