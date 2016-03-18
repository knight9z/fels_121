<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesTable extends Migration
{

    public function up()
    {
        Schema::create('languages', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('iso_code', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('languages');
    }
}