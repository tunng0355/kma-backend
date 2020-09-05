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
            $table->string('role',24)->default(USER);
            $table->string('email',128)->unique();
            $table->string('password');
            $table->string('codeStudent', 12)->unique();
            $table->string('userName', 25);
            $table->tinyInteger('status')->default(USER_NEW);
            $table->mediumInteger('sendCode')->nullable();
            $table->string('avatar')->default('upload/avatar-default.png');
            $table->rememberToken()->nullable();
            $table->timestamps();

//            //primary
//            $table->foreign('userId')->references('id')->on('message');
//        Schema::table('message', function(Blueprint $table) {
//            $table->foreign('userId')->references('id')->on('users');
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
