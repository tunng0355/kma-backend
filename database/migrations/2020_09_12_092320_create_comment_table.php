<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id'); // The data type is Big Integer.
            $table->unsignedBigInteger("userId");
            $table->unsignedBigInteger("postId")->nullable();
            $table->integer("childId")->nullable();
            $table->tinyInteger('isHot')->default(0);
            $table->string('content')->nullable();
            $table->timestamps();
        });

        Schema::table('comment', function(Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('postId')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
