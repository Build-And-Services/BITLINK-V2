<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('akundinasnganjuk', function (Blueprint $table) {
            $table->id('id')->unsigned()->autoIncrement();
            $table->unsignedBigInteger('id_user');
            $table->string('nama_instansi', 255)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->string('alamat_lengkap', 255)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->string('telepon', 15)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            // $table->string('email', 50)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            // $table->string('username', 15)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            // $table->string('password', 15)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            // $table->id('id_akun')->unsigned()->autoIncrement();
        });
    }

    public function down()
    {
        Schema::dropIfExists('akundinasnganjuk');
    }
};
