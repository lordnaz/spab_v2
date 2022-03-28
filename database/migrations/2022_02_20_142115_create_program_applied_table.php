<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramAppliedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_applied', function (Blueprint $table) {
            $table->id('program_applid');
            $table->foreignId('nric')->index();
            $table->foreignId('program_id')->index()->nullable();
            $table->foreignId('program_id2')->index()->nullable();        
            $table->string('program_name')->nullable();
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
        Schema::dropIfExists('program_applied');
    }
}
