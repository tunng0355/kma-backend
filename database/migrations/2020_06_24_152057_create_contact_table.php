<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',128)->unique();
            $table->string('name',22);
            $table->string('message');
            $table->boolean('miss');
            $table->boolean('project');
            $table->integer('age')->nullable();
            $table->string('job')->nullable();
            $table->integer('gender')->nullable();
            $table->double('review_level');
            $table->string('select_review');
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
        Schema::dropIfExists('contact');
    }
}
