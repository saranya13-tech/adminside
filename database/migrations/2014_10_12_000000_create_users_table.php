<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
        DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'email' => 'admin@gmail.com',
                    'password' => '5EBE2294ECD0E0F08EAB7690D2A6EE69',
                    'name'=>'admin'
                    
                )));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
