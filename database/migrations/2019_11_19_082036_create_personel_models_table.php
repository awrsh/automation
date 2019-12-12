<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonelModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personel', function (Blueprint $table) {
            $table->bigIncrements('personel_id');
            $table->text('personel_name');
            $table->text('personel_education');
            $table->text('personel_codenational');
            $table->text('personel_phone');
            $table->text('personel_tel');
            $table->text('personel_username');
            $table->text('personel_password');
            $table->text('personel_address');
            $table->text('personel_status');
            $table->text('personel_role');
            $table->text('personel_permissions');
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
        Schema::dropIfExists('personel');
    }
}
