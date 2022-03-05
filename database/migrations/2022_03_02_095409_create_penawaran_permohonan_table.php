<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaranPermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawaran_permohonan', function (Blueprint $table) {
            $table->id('penawaran_permohonanid');
            $table->foreignId('nric')->index();
            $table->string('tempat_temuduga')->nullable();
            $table->string('cadang1')->nullable();
            $table->string('cadang2')->nullable();
            $table->string('program_tawar')->nullable();
            $table->dateTime('tarikh_tawar')->nullable();
            $table->dateTime('tarikh_terima')->nullable();
            $table->string('tarikh_daftar')->nullable();
            $table->string('masa_daftar')->nullable();
            $table->string('tempat_daftar')->nullable();
            $table->string('catatan')->nullable();
            $table->integer('markah')->nullable();
            $table->integer('sesi')->nullable();
            $table->integer('sem')->nullable();
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
        Schema::dropIfExists('penawaran_permohonan');
    }
}
