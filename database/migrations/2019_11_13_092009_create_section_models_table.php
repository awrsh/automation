<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSectionModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('sections_id');
            $table->text('sections_name');
            $table->timestamps();
        });



        DB::table('sections')->insert([
            ['sections_name' => 'ابتدایی'],
            ['sections_name' => 'دوره اول متوسطه'],
            ['sections_name' => 'دوره دوم متوسطه'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
