<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('school_id');
            $table->text('school_url');
            $table->text('school_name');
            $table->text('school_name_manager');
            $table->text('school_phone_manager');
            $table->text('school_username');
            $table->text('school_password');
            $table->text('school_count_students');
            $table->text('school_address')->nullable();
            $table->text('school_profile')->nullable();
            $table->integer('school_sections');
            $table->text('school_status');
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
