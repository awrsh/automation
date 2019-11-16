<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic', function (Blueprint $table) {
            $table->bigIncrements('basic_id');
            $table->text('basic_name');
            $table->bigInteger('section_id');
            $table->timestamps();
        });


        DB::table('basic')->insert([
            ['basic_name' => ' اول','section_id'=> 1],
            ['basic_name' => ' دوم','section_id'=> 1],
            ['basic_name' => ' سوم','section_id'=> 1],
            ['basic_name' => ' چهارم','section_id'=> 1],
            ['basic_name' => ' پنجم','section_id'=> 1],
            ['basic_name' => ' ششم','section_id'=> 1],
            ['basic_name' => ' هفتم','section_id'=> 2],
            ['basic_name' => ' هشتم','section_id'=> 2],
            ['basic_name' => ' نهم','section_id'=> 2],
            ['basic_name' => ' دهم','section_id'=> 3],
            ['basic_name' => ' یازدهم','section_id'=> 3],
            ['basic_name' => ' دوازدهم','section_id'=> 3],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic');
    }
}
