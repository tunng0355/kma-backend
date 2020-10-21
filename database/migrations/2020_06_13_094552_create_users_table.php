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
            $table->string('userName', 25)->unique();
            $table->tinyInteger('status')->default(USER_NEW);
            $table->mediumInteger('sendCode')->nullable();
            $table->string('avatar')->nullable();
            $table->string('coverImage')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
