<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screening_interview', function (Blueprint $table) {
            $table->id('screening_id');
            $table->foreignId('nric')->index();
            $table->foreignId('center_id')->nullable()->index();
            $table->foreignId('session_id')->nullable()->index();
            $table->string('kelulusan1')->nullable();
            $table->string('kelulusan2')->nullable();
            $table->dateTime('TarikhProses')->nullable();
            $table->dateTime('TarikhHadir')->nullable();
            $table->dateTime('MasaFrom')->nullable();
            $table->dateTime('MasaTo')->nullable();
            $table->string('status_sesi')->nullable();
            $table->string('catatan_temuduga')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('screening_interview');
    }
}
