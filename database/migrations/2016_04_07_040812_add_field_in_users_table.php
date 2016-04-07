<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'remember_token')) {
                $table->rememberToken();
            };

            if (Schema::hasColumn('users', 'pass')) {
                $table->renameColumn('pass', 'password');
            };
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'remember_token')) {
                $table->dropColumn('remember_token');
            };

            if (!Schema::hasColumn('users', 'password')) {
                $table->renameColumn('password', 'pass');
            };

        });
    }
}
