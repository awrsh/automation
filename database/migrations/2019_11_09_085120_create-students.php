<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->unsignedBigInteger('school_id');
            $table->text('student_firstname')->nullable();
            $table->text('student_lastname')->nullable();
            $table->text('student_password')->nullable();
            $table->text('student_certificate_number')->nullable();
            $table->text('student_national_number')->nullable();
            $table->text('student_father_name')->nullable();
            $table->text('student_father_mobile')->nullable();
            $table->text('student_mother_mobile')->nullable();
            $table->text('student_birthday')->nullable();
            $table->integer('student_student_class')->nullable();
            $table->text('student_student_number')->nullable();
            $table->text('student_home_tel')->nullable();
            $table->text('student_student_mobile')->nullable();
            $table->text('student_prev_school')->nullable();
            $table->text('student_student_photo')->nullable();
            $table->text('serial_certificate_number')->nullable();
            $table->text('place_of-birth')->nullable();
            $table->text('remember_token')->nullable();           
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
        Schema::dropIfExists('schools');
    }
}
