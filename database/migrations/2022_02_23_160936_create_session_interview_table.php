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
            $table->foreignId('asas_id')->index();
            $table->integer('number_session')->nullable();
            $table->dateTime('TarikhFrom')->nullable();
            $table->dateTime('TarikhTo')->nullable();
            $table->dateTime('DateFrom')->nullable();
            $table->dateTime('DateTo')->nullable();
            $table->string('description')->nullable();
            $table->string('place_description')->nullable();
            $table->boolean('status')->default(true);
            $table->string('job_id')->nullable();
            $table->json('panel_id')->nullable();
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
