<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserLessonResultTable extends Migration
{

    public function up()
    {
        Schema::create('user_lesson_result', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_lesson_id')->unsigned();
            $table->integer('word_id')->unsigned();
            $table->integer('word_answer_id')->unsigned();
            $table->integer('word_answer_correct_id')->unsigned();
            $table->integer('word_answer_wrong_id_1')->unsigned();
            $table->integer('word_answer_wrong_id_2')->unsigned();
            $table->integer('word_answer_wrong_id_3')->unsigned();
            $table->tinyInteger('is_correct')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('user_lesson_result');
    }
}