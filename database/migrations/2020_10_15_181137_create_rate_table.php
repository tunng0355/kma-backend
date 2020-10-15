<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("userId");
            $table->unsignedBigInteger("userIdRate");
            $table->double('rateCount', 10, 1)->nullable();
            $table->string('rateContent')->nullable();
        });

        Schema::table('rate', function(Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('userIdRate')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate');
    }
}
