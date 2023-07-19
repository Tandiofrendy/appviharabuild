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
        Schema::create('roleadmin', function (Blueprint $table) {
            $table->id();
            $table->string('email_user');
            $table->foreign('email_user')->references('email')->on('users');
            $table->string('kode_divisi',10);
            $table->foreign('kode_divisi')->references('kode_divisi')->on('divisi');
            $table->string('role',30);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('roleadmin');
    }
};
