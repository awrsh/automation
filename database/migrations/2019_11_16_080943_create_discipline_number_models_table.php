<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplineNumberModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipline_number', function (Blueprint $table) {
            $table->bigIncrements('number_id');
            $table->text('number_group');
            $table->text('number_date_start');
            $table->text('number_date_end');
            $table->integer('student_id');
            $table->integer('number_score');
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
        Schema::dropIfExists('discipline_number');
    }
}
