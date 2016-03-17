<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryLocalesTable extends Migration
{

    public function up()
    {
        Schema::create('category_locales', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title')->default('No data in this language');
            $table->string('summary', 255)->default('No data in this language');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('category_locales');
    }
}