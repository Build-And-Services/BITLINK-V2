<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMitraTable extends Migration
{
    public function up()
    {
        Schema::create('kemitraan_data', function (Blueprint $table) {
            $table->id('id_kemitraan')->unsigned()->autoIncrement();
            $table->string('nama_mitra', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kemitraan_data');
    }
}
