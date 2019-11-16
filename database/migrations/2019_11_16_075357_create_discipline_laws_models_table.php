<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplineLawsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipline_laws', function (Blueprint $table) {
            $table->bigIncrements('law_id');
            $table->text('law_title');
            $table->text('law_type');
            $table->text('law_count');
            $table->text('law_num');
            $table->integer('basic_id');
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
        Schema::dropIfExists('discipline_laws');
    }
}
