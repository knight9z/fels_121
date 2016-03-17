<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWordAnswersTable extends Migration
{

    public function up()
    {
        Schema::create('word_answers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('word_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('word_answers');
    }
}