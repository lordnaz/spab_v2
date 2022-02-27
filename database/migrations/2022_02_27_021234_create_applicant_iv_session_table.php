<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantIvSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_iv_session', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nric')->index();
            $table->string('center_id')->nullable();
            $table->string('iv_place_selected')->nullable();
            $table->string('number_session')->nullable();
            $table->string('date_session')->nullable();
            $table->string('time_session')->nullable();
            $table->string('description_admin')->nullable();
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
        Schema::dropIfExists('applicant_iv_session');
    }
}
