<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseDailyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_daily', function (Blueprint $table) {
            $table->bigIncrements('exercise_id');
            $table->text('exercise_name');
            $table->integer('class_id');
            $table->integer('lesson_id');
            $table->text('exercise_date');
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
        Schema::dropIfExists('exercise_daily');
    }
}
