<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->bigIncrements('id'); // The data type is Big Integer.
            $table->unsignedBigInteger("user_id");
            $table->string('user_name', 25);
            $table->string('name');
            $table->string('code_std', 12);
            $table->dateTime('birthday', 0);
            $table->tinyInteger('gender')->default(0);
            $table->string('job')->nullable();
            $table->timestamps();
        });

        Schema::table('user_info', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_info');
    }
}
