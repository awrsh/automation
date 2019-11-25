<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('fullname_admin');
            $table->text('email_admin');
            $table->text('mobile_admin');
            $table->text('username_admin');
            $table->text('password_admin');
            $table->text('status_admin');
            $table->timestamps();
        });

       DB::table('admin')->insert([
           'fullname_admin'=>'مدیر',
           'email_admin'=>'elmino@example.co',
           'mobile_admin'=>'09123456789',
           'username_admin'=>'Admin_elmino',
           'password_admin'=>'123456',
           'status_admin'=>'on'
       ]);


      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
