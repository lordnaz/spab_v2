<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_activities', function (Blueprint $table) {
            $table->id('club_id');
            $table->foreignId('nric')->index();
            $table->string('club')->nullable();
            $table->string('role')->nullable();
            $table->string('year_taken')->nullable();
            $table->string('sequence')->nullable();
            $table->boolean('status')->default(true);
            $table->string('job_id')->nullable();
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
        Schema::dropIfExists('club_activities');
    }
}
