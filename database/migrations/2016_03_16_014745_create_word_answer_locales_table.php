<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWordAnswerLocalesTable extends Migration
{

    public function up()
    {
        Schema::create('word_answer_locales', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('word_answer_id')->unsigned();
            $table->string('content_answer', 255)->default('No data in this language');
            $table->text('note_answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('word_answer_locales');
    }
}