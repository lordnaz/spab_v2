<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewPanelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_panel', function (Blueprint $table) {
            $table->id('panel_id');
            $table->foreignId('no_ic')->nullable();
            $table->string('panel_name')->nullable();
            $table->string('panel_position')->nullable();
            $table->string('panel_faculty')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('tel_house')->nullable();
            $table->string('tel_phone')->nullable();
            $table->string('panel_email')->nullable();
            $table->string('description')->nullable();
            $table->string('panel_status')->nullable();
            $table->boolean('status')->default(true);
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('interview_panel');
    }
}
