<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationPermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_permohonan', function (Blueprint $table) {
            $table->id('permohonan_id');
            $table->foreignId('nric')->index();
            $table->string('institution_others_qc')->nullable();
            $table->string('grade_others_qc')->nullable();
            $table->string('specialization_others_qc')->nullable();
            $table->string('year_others_qc')->nullable();
            $table->string('sequence')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('qualification_permohonan');
    }
}
