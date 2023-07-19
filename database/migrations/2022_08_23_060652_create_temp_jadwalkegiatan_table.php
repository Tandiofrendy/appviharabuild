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
        Schema::create('temp_jadwalkegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kegiatan',10);
            $table->foreign('kode_kegiatan')->references('kode_kegiatan')->on('jadwalkegiatan');
            $table->string('kodekategori',30);
            $table->foreign('kodekategori')->references('kodekategori')->on('kategorikegiatans');
            $table->string('kode_vihara',10);
            $table->foreign('kode_vihara')->references('kode_vihara')->on('vihara');
            $table->string('judul_kegiatan',100);
            $table->date('tanggal_kegiatan');
            $table->date('tglselesai_kegiatan')->nullable();
            $table->time('mulai_kegiatan');
            $table->time('selesai_kegiatan');
            $table->boolean('lama_kegiatan')->default(false);
            $table->string('nama_penceramah',100)->nullable();
            $table->text('keterangan');
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
        Schema::dropIfExists('temp_jadwalkegiatan');
    }
};
