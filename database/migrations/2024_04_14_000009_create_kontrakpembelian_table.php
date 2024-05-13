<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontrakPembelianTable extends Migration
{
    public function up()
    {
        Schema::create('kontrak_pembelian', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kontrak');
            $table->unsignedBigInteger('id_akunm');
            $table->foreign('id_akunm')->references('id')->on('akundinasnonnganjuk')->onDelete('cascade')->onUpdate('cascade');
            $table->string('alamat_lengkap', 255);
            $table->string('email', 50);
            $table->string('telepon', 15);
            $table->date('tgl_pengiriman');
            $table->string('pembayaran', 50);
            $table->string('status_kontrak', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontrak_pembelian');
    }
}
