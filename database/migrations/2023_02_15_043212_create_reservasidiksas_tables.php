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
        Schema::create('reservasidiksas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking');
            $table->string('kategori_pendiksa',30);
            $table->string('nama_pendiksa');
            $table->string('no_hp',15);
            $table->date('tgl_lahir');
            $table->foreign('kode_booking')->references('kode_booking')->on('bookingdiksas');
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
        Schema::dropIfExists('reservasidiksas');
    }
};
