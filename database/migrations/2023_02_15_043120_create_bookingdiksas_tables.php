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
        Schema::create('bookingdiksas', function (Blueprint $table) {
            $table->string('kode_booking')->primary();
            $table->date('tanggal_diksa');
            $table->string('kode_vihara',10);
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
            $table->foreign('kode_vihara')->references('kode_vihara')->on('vihara');
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
        Schema::dropIfExists('bookingdiksas');
    }
};
