<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id'); // The data type is Big Integer.
            $table->unsignedBigInteger("userId");
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('isHot')->default(0);
            $table->smallInteger('subjectId');
            $table->string('caption')->nullable();
            $table->string('content')->nullable();
            $table->string('tag')->nullable();
            $table->timestamps();
        });

        Schema::table('posts', function(Blueprint $table) {
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
        Schema::dropIfExists('posts');
    }
}
