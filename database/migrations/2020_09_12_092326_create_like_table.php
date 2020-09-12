<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like', function (Blueprint $table) {
            $table->bigIncrements('id'); // The data type is Big Integer.
            $table->unsignedBigInteger("userId");
            $table->unsignedBigInteger("postId");
            $table->unsignedBigInteger("commentId");
            $table->timestamps();
        });

        Schema::table('like', function (Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('postId')->references('id')->on('posts');
            $table->foreign('commentId')->references('id')->on('comment');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like');
    }
}
