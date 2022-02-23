<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuetResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muet_result', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nric')->index();
            $table->string('year_muet')->nullable();
            $table->string('grade')->nullable();
            $table->string('speaking_grade')->nullable();
            $table->string('reading_grade')->nullable();
            $table->string('writing_grade')->nullable();
            $table->string('band')->nullable();
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
        Schema::dropIfExists('muet_result');
    }
}
