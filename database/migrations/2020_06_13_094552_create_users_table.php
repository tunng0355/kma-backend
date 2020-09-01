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
            $table->bigIncrements('id')->unique();
            $table->string('name');
            $table->string('email',128)->unique();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->string('role',24)->nullable();
            $table->string('job')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();

//            //primary
//            $table->foreign('user_id')->references('id')->on('message');
//        Schema::table('message', function(Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users');
//        });
        });
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
