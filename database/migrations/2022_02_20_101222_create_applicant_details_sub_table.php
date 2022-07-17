<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantDetailsSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_details_sub', function (Blueprint $table) {
            $table->id('application_id');
            $table->string('nric')->unique();
            $table->string('status_marriage')->nullable();
            $table->string('partner_name')->nullable();
            $table->string('partner_address_1')->nullable();
            $table->string('partner_address_2')->nullable();
            $table->string('partner_address_3')->nullable();
            $table->string('partner_no_tel')->nullable();
            $table->string('partner_no_phonehouse')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_nric_old')->nullable();
            $table->string('guardian_nric_new')->nullable();
            $table->string('guardian_no_tel')->nullable();
            $table->string('guardian_no_phonehouse')->nullable();
            $table->string('guardian_address_1')->nullable();
            $table->string('guardian_address_2')->nullable();
            $table->string('guardian_address_3')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_income')->nullable();
            $table->string('relationship')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('number_of_dependents')->nullable();
            $table->string('relationship_guardian')->nullable();
            $table->string('kin_name')->nullable();
            $table->string('kin_relationship')->nullable();
            $table->string('kin_no_tel')->nullable();
            $table->string('kin_no_phonehouse')->nullable();
            $table->string('kin_email')->nullable();
            $table->string('kin_address_1')->nullable();
            $table->string('kin_address_2')->nullable();
            $table->string('kin_address_3')->nullable();
            $table->string('job_id')->nullable();
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
        Schema::dropIfExists('applicant_details_sub');
    }
}
