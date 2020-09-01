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
            $table->bigIncrements('id'); // The data type is Big Integer.
            $table->text('message');
            $table->string('type', 11)->nullable();
            $table->unsignedBigInteger("user_id");
            $table->string('react')->nullable();
            $table->string('count_react')->nullable();
            $table->timestamps();
        });

        Schema::table('message', function(Blueprint $table) {
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
        Schema::dropIfExists('message');
    }
}
