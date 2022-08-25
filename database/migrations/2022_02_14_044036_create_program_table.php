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
            $table->string('code')->nullable();
            $table->string('program')->nullable();
            $table->string('type')->nullable();
            $table->string('faculty')->nullable();
            $table->string('field')->nullable();
            $table->string('sub_field')->nullable();
            $table->string('mqa')->nullable();
            $table->string('notes')->nullable();
            $table->string('job_id')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('program');
    }
}
