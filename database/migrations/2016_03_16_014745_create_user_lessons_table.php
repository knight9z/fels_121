<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserLessonsTable extends Migration
{

    public function up()
    {
        Schema::create('user_lessons', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('lesson_id')->unsigned();
            $table->smallInteger('total_correct');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('user_lessons');
    }
}