<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dataevaluasi', function (Blueprint $table) {
            $table->id('id_evaluasi')->unsigned()->autoIncrement();
            $table->unsignedBigInteger('id_akunp');
            $table->foreign('id_akunp')->references('id')->on('data_akun_produsen')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_evaluasi');
            $table->text('kinerja_produksi')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->string('kualitas_benih', 50)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->text('kendala_produksi')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->text('saran_produksi')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dataevaluasi');
    }
};
