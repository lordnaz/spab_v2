<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_interview', function (Blueprint $table) {
            $table->id('session_id');
            $table->foreignId('center_id')->index();
            $table->string('number_session')->nullable();
            $table->string('date_session')->nullable();
            $table->string('time_session')->nullable();
            $table->string('place_description')->nullable();
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
        Schema::dropIfExists('session_interview');
    }
}
