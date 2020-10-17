<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends_follow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("userId")->unique();
            $table->binary('friends')->nullable();
            $table->binary('follows')->nullable();
            $table->binary('follows_groups')->nullable();
            $table->timestamps();
        });

        Schema::table('friends_follow', function(Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends_follow');
    }
}
