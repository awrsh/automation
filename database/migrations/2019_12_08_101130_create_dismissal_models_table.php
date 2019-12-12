<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDismissalModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dismissal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('dismissal_date');
            $table->text('dismissal_desc');
            $table->text('dismissal_effect');
            $table->text('lesson_id');
            $table->text('student_id');
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
        Schema::dropIfExists('dismissal');
    }
}
