<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateLessonModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('lesson_name');
            $table->integer('basic_id');
            $table->timestamps();
        });

        DB::table('lessons')->insert([
            [
            'lesson_name' => ' ریاضی 1',
            'basic_id' => 1
        ],[
            'lesson_name' => 'فیزیک 1',
            'basic_id' => 1
        ],[
            'lesson_name' => 'زبان',
            'basic_id' => 1
        ],[
            'lesson_name' => 'ریاضی 2',
            'basic_id' => 2
        ],[
            'lesson_name' => 'فیزیک 2',
            'basic_id' => 2
        ],[
            'lesson_name' => 'زبان 2',
            'basic_id' => 2
        ],[
            'lesson_name' => 'زبان عربی2',
            'basic_id' => 2
        ],[
            'lesson_name' => 'علوم تجربی2',
            'basic_id' => 2
        ],[
            'lesson_name' => 'تربیت بدنی و سلامت2',
            'basic_id' => 2
        ],[
            'lesson_name' => 'تفکر و سبک زندگی2',
            'basic_id' => 2
        ],[
            'lesson_name' => 'املای فارسی2',
            'basic_id' => 2
        ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
