<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWordsTable extends Migration
{

    public function up()
    {
        Schema::create('words', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('content', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('words');
    }
}