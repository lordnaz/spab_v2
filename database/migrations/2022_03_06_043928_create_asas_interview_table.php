<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsasInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asas_interview', function (Blueprint $table) {
            $table->id('asas_id');
            $table->foreignId('center_id')->index();
            $table->string('job_id')->nullable();
            $table->json('negeri')->nullable();
            $table->string('catatan')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('asas_interview');
    }
}
