<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenameTableLessonWords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('lesson_words')) {
            Schema::rename('lesson_words', 'lesson_word');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('lesson_word')) {
            Schema::rename('lesson_word', 'lesson_words');
        }
    }
}
