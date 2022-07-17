<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id('information_id');
            $table->string('nric')->unique();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('email')->nullable();
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
            $table->string('form_completion')->nullable();
            $table->string('description')->nullable();
            $table->string('status_admission')->nullable();
            $table->string('type_program_applied')->nullable();
            $table->dateTime('date_application')->nullable();
            $table->dateTime('date_acceptance')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('user_information');
    }
}
