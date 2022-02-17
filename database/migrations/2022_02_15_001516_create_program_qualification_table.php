<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_qualification', function (Blueprint $table) {
            $table->id('pqualification_id');
            $table->string('code');
            $table->string('subj_code');
            $table->string('subj_name');
            $table->string('min_grade');
            $table->string('created_by');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('program_qualification');
    }
}
