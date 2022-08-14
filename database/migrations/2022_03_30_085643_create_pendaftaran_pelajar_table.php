<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranPelajarTable extends Migration
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
            $table->string('job_id')->nullable();
            $table->string('no_matriks')->nullable();
            $table->string('hostel_room')->nullable();
            $table->string('no_resit')->nullable();
            $table->string('total_payment')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('bank')->nullable();
            $table->string('surat_tawaran', 300)->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('payment_details')->nullable();
            $table->string('created_by')->nullable();
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
