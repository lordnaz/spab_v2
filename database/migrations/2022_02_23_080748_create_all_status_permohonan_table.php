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
            $table->foreignId('nric')->index();
            $table->string('status_validation')->nullable();
            $table->string('status_pendaftaran')->nullable();
            $table->string('modified_by_validation')->nullable();
            $table->timestamp('updated_date_validation')->nullable();
            $table->string('status_offer')->nullable();
            $table->string('balasan_calon')->nullable();
            $table->string('status_temuduga')->nullable();
            $table->string('modified_by_offer')->nullable();
            $table->timestamp('updated_date_offer')->nullable();
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
