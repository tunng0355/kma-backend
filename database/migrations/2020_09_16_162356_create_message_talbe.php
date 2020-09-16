<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTalbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("roomId")->nullable();
            $table->unsignedBigInteger("userId");
            $table->binary('message');
            $table->tinyInteger('type')->default(0);
            $table->timestamps();
            //$table->string('react')->nullable();
            //$table->string('count_react')->nullable();
        });

        Schema::table('message', function(Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('roomId')->references('id')->on('room_chat');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}
