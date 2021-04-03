<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmallQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('small_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('genre_value');
            $table->integer('option_num');
            $table->integer('big_question_id');
            $table->integer('question_num');
            $table->string('question');
            $table->string('answer');
            $table->string('answer2');
            $table->string('answer3');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('small_questions');
    }
}
