<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesReportCardModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies_report_card', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('studies_average');
            $table->integer('student_one_id');
            $table->integer('student_two_id');
            $table->integer('student_three_id');
            $table->integer('studies_id');
            $table->integer('class_id');
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
        Schema::dropIfExists('studies_report_card');
    }
}
