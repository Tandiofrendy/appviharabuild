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
        Schema::create('post_jadwalkegiatan', function (Blueprint $table) {
            $table->string('kode_posting',15);
            $table->primary('kode_posting');
            $table->string('kodekategori',30);
            $table->foreign('kodekategori')->references('kodekategori')->on('kategorikegiatans');
            $table->string('kode_vihara',10);
            $table->foreign('kode_vihara')->references('kode_vihara')->on('vihara');
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
            $table->string('judul_kegiatan',100);
            $table->date('tanggal_kegiatan');
            $table->date('tglselesai_kegiatan');
            $table->time('mulai_kegiatan');
            $table->time('selesai_kegiatan');
            $table->boolean('lama_kegiatan')->default(false);
            $table->string('nama_penceramah',100)->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('status_posting')->default(false);
            $table->string('kodeqr',30)->nullable();
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
        Schema::dropIfExists('post_jadwalkegiatan');
    }
};
