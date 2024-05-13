<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('datatracking', function (Blueprint $table) {
            $table->id('id_tracking')->unsigned()->autoIncrement();
            $table->string('Status', 50)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('kontrak_pembelian')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datatracking');
    }
};
