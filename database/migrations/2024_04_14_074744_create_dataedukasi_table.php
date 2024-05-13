<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dataedukasi', function (Blueprint $table) {
            $table->id('id_edukasi')->unsigned()->autoIncrement();
            $table->date('tanggal_edukasi');
            $table->text('judul_edukasi')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->text('isi_edukasi')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('id_akunp');
            $table->foreign('id_akunp')->references('id')->on('data_akun_produsen')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dataedukasi');
    }
};
