<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTakenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_taken', function (Blueprint $table) {
            $table->id('course_takenid');
            $table->foreignId('nric')->index();
            $table->string('course_taken')->nullable();
            $table->string('course_organizer')->nullable();
            $table->string('place_taken')->nullable();
            $table->string('year_taken')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
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
        Schema::dropIfExists('course_taken');
    }
}
