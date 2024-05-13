<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPencatatanBenihTable extends Migration
{
    public function up()
    {
        Schema::create('benih_data', function (Blueprint $table) {
            $table->id('id_benih')->unsigned()->autoIncrement();
            $table->string('varietas', 255);
            $table->string('jenis_benih', 50);
            $table->integer('stok_benih');
            $table->string('kualitas_benih', 100);
            $table->decimal('harga_benih', 10, 0);
            $table->text('foto_benih');
            $table->date('tgl_masuk');
            $table->integer('turun_gudang');
            $table->integer('jemur_kering');
            $table->integer('blower1');
            $table->integer('benih_susut');
            $table->integer('biji_kecil');
            $table->integer('jumlah_benih');
            $table->unsignedBigInteger('id_akunp');
            $table->foreign('id_akunp')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('benih_data');
    }
}
