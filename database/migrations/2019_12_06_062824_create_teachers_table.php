<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('teacher_lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('class_name');
            $table->text('class_id');
            $table->text('lesson_id');
            $table->text('lesson_name');
            $table->integer('teacher_id');
            $table->timestamps();
        });
        
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('teacher_fullname');
            $table->string('teacher_password');
            $table->string('teacher_email');
            $table->text('teacher_profile')->nullable();
            $table->string('teacher_mobile');
            $table->string('teacher_tel');
            $table->text('teacher_address'); 
            $table->text('teacher_birthday');
            $table->text('teacher_Education');
            $table->text('teacher_certificate_code');
            $table->text('teacher_pw');
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
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('teacher_lessons');
    }
}
