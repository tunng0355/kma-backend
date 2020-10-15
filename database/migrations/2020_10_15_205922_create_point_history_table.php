<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("userId");
            $table->integer('total');
            $table->tinyInteger('type');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::table('point_history', function(Blueprint $table) {
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
        Schema::dropIfExists('point_history');
    }
}
