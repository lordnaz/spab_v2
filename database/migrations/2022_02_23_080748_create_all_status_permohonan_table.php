<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllStatusPermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_status_permohonan', function (Blueprint $table) {
            $table->id('status_id');
            $table->string('no_siri')->nullable();
            $table->string('job_id')->nullable();
            $table->string('nric')->nullable();;
            $table->string('study_mode')->nullable();;
            $table->string('status_validation')->nullable();
            $table->string('status_pendaftaran')->nullable();
            $table->string('all_status')->nullable();
            $table->string('modified_by_validation')->nullable();
            $table->timestamp('updated_date_validation')->nullable();
            $table->timestamp('submit_permohonan')->nullable();
            $table->timestamp('tarikh_balasan')->nullable();
            $table->timestamp('tarikh_daftar')->nullable();
            $table->string('description_validation')->nullable();
            $table->string('status_offer')->nullable();
            $table->string('balasan_calon')->nullable();
            $table->string('balasan_calon_description')->nullable();
            $table->string('status_temuduga')->nullable();
            $table->string('status_global')->nullable();
            $table->string('modified_by_offer')->nullable();
            $table->timestamp('updated_date_offer')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('all_status_permohonan');
    }
}
