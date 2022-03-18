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
            $table->foreignId('cadang1')->nullable();
            $table->foreignId('cadang2')->nullable();
            $table->integer('markah')->nullable();
            $table->string('program_tawar')->nullable();
            $table->integer('sem')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('tarikh_daftar')->nullable();
            $table->string('masa_daftar')->nullable();
            $table->string('tempat_daftar')->nullable();
            $table->string('catatan')->nullable();            
            $table->dateTime('TarikhTawar')->nullable();
            $table->dateTime('TarikhKIV')->nullable();
            $table->dateTime('TarikhTolak')->nullable();
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
