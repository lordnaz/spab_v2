<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_center', function (Blueprint $table) {
            $table->id('center_id');
            $table->string('code_center')->nullable();
            $table->string('name_center')->nullable();
            $table->string('address_center_1')->nullable();
            $table->string('address_center_2')->nullable();
            $table->string('address_center_3')->nullable();
            $table->string('tel_no_center')->nullable();
            $table->string('fax_no_center')->nullable();
            $table->string('officer_center')->nullable();
            $table->string('position_officer_center')->nullable();
            $table->string('description_center')->nullable();
            $table->string('status_center')->nullable();
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
        Schema::dropIfExists('interview_center');
    }
}
