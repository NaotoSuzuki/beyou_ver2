<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Answers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('genre_value');
            $table->integer('opetion_num');
            $table->integer('big_question_id');
            $table->integer('question_num');
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
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
        Schema::dropIfExists('Answers');
    }
}
