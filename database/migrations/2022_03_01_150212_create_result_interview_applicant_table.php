<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultInterviewApplicantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_interview_applicant', function (Blueprint $table) {
            $table->id('result_id');
            $table->foreignId('nric')->index();
            $table->string('marks_iv')->nullable();
            $table->string('status_iv')->nullable();
            $table->string('job_id')->nullable();
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
        Schema::dropIfExists('result_interview_applicant');
    }
}
