<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinformations', function (Blueprint $table) {
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
            $table->string('nama_mandarin',50);
            $table->string('nama_indonesia',50);
            $table->string('alamat',150);
            $table->date('ttlahir');
            $table->string('nohp',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userinformations');
    }
};
