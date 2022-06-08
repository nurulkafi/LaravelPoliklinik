<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('jadwal_dokter_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->date('tgl_pendaftaran');
            $table->integer('no_antrian');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('pasien');
            $table->foreign('jadwal_dokter_id')->references('id')->on('jadwal_dokter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
}
