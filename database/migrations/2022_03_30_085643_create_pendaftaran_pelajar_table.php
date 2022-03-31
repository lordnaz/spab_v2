<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranPelajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_pelajar', function (Blueprint $table) {
            $table->id('pendaftaran_id');
            $table->foreignId('nric')->index();
            $table->string('no_matriks');
            $table->string('hostel_room');
            $table->string('no_resit');
            $table->string('total_payment');
            $table->string('payment_type');
            $table->string('bank');
            $table->string('payment_reference');
            $table->string('payment_details');
            $table->string('created_by');
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
        Schema::dropIfExists('pendaftaran_pelajar');
    }
}
