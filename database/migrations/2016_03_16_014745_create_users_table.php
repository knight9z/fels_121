<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('pass', 255);
            $table->string('email', 255);
            $table->string('avatar');
            $table->tinyInteger('role');
            $table->smallInteger('percent_skill')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}