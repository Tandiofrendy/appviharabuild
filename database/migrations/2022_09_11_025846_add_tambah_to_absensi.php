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
        Schema::table('absensi', function (Blueprint $table) {
            $table->string('email',100);
            $table->foreign('email')->references('email')->on('users');
            $table->string('kode_posting',15);
            $table->foreign('kode_posting')->references('kode_posting')->on('post_jadwalkegiatan');
            $table->dateTime('waktu_absensi',$precision=0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi', function (Blueprint $table) {
         //
        });
    }
};
