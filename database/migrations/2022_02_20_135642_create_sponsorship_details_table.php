<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorshipDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorship_details', function (Blueprint $table) {
            $table->id('sponsor_id');
            $table->foreignId('nric')->index();
            $table->string('sponsorship')->nullable();
            $table->string('address_sponsorship')->nullable();
            $table->string('type_sponsorship')->nullable();
            $table->string('reference_no_spsp')->nullable();
            $table->dateTime('date_offer')->nullable();
            $table->string('monthly_amount_spsp')->nullable();
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
        Schema::dropIfExists('sponsorship_details');
    }
}
