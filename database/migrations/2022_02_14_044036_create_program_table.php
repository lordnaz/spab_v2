<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
             $table->id('program_id');
            $table->timestamps();
            $table->string('code');
            $table->string('program');
            $table->string('type');
            $table->string('faculty');
            $table->string('field');
            $table->string('sub-field');
            $table->string('notes');
            $table->string('status');
            $table->string('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
}
