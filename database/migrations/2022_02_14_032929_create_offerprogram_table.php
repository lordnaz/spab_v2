<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferprogramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerprogram', function (Blueprint $table) {
            $table->id('offerprogram_id');
            $table->string('mode');
            $table->string('notes');
            $table->integer('quota');
            $table->integer('quota_semasa');
            $table->string('registration_date');
            $table->string('registration_time');
            $table->string('registration_venue');
            $table->string('qualification_text');
            $table->string('status_aktif');
            $table->string('status_validate');
            $table->boolean('status')->default(true);
            $table->string('created_by');
            $table->foreignId('program_id')->index();
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
        Schema::dropIfExists('offerprogram');
    }
}
