<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportCardModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('lesson_name');
            $table->integer('lesson_id');
            $table->integer('lesson_zarib');
            $table->text('lesson_score');
            $table->integer('report_card_id');
            $table->timestamps();
        });

        Schema::create('report_card', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('report_card_name');
            $table->integer('class_id');
            $table->integer('school_id');
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
        Schema::dropIfExists('report_card');
        Schema::dropIfExists('report_lessons');
    }
}
