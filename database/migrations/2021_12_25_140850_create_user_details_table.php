<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id('user_detailsid');
            $table->foreignId('user_id')->index();
            $table->string('nric')->unique();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('race')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('state')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth_cert_no')->nullable();
            $table->string('nationality')->nullable();
            $table->string('tel_house')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('dun')->nullable();
            $table->string('parliament')->nullable();
            $table->string('payment_ref_no')->nullable();
            $table->string('form_description')->nullable();
            $table->boolean('form_completion')->default(false);
            $table->string('description')->nullable();
            $table->string('status_admission')->nullable();
            $table->string('type_program_applied')->nullable();
            $table->timestamp('date_application')->nullable();
            $table->timestamp('date_acceptance')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
