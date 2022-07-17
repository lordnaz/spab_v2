<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_experiences', function (Blueprint $table) {
            $table->id('application_exid');
            $table->foreignId('nric')->index();
            $table->string('job_type')->nullable();
            $table->string('monthly_income')->nullable();
            $table->dateTime('year_working')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('no_faks')->nullable();
            $table->string('cert_related_program')->nullable();
            $table->string('description_cert')->nullable();
            $table->string('work_exp_related_program')->nullable();
            $table->string('description_work_exp')->nullable();
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
        Schema::dropIfExists('applicant_experiences');
    }
}
