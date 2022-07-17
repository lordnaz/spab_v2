<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_grade', function (Blueprint $table) {
            $table->id('subject_gradeid');
            $table->foreignId('nric')->index();
            $table->string('year')->nullable();
            $table->string('subject_list')->nullable();
            $table->integer('grade')->nullable();
            $table->string('type_qualification')->nullable();
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
        Schema::dropIfExists('subject_grade');
    }
}
