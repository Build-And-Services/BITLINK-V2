<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_kontrak_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_benih');
            $table->foreign('id_benih')->references('id_benih')->on('benih_data')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_kontrak_pembelian');
    }
};
