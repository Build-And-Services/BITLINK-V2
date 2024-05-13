<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_benih');
            $table->unsignedBigInteger('id_user');
            $table->integer('quantity');
            $table->integer('harga');
            $table->string('nama_penerima');
            $table->string('alamat_lengkap');
            $table->string('telepon');
            $table->date('tgl_pengiriman')->nullable();
            $table->date('tgl_diterima')->nullable();
            $table->enum('status_pembayaran', ['SUKSES', 'BELUM DIBAYAR', 'DIBATALKAN'])->default('BELUM DIBAYAR');
            $table->enum('status_pengiriman', ['PROSES', 'SEDANG DIKIRIM', 'DITERIMA'])->default('PROSES');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
