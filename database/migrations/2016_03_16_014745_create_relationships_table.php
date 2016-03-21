<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelationshipsTable extends Migration
{

    public function up()
    {
        Schema::create('relationships', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('follower_id')->unsigned();
            $table->integer('following_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('relationships');
    }
}