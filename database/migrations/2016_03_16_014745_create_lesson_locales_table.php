<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLessonLocalesTable extends Migration {

    public function up()
    {
        Schema::create('lesson_locales', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('lesson_id')->unsigned();
            $table->string('title', 255)->default('No data in this language');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('lesson_locales');
    }
}