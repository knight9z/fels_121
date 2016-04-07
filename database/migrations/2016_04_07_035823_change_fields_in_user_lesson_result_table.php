<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsInUserLessonResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_lesson_result', function (Blueprint $table) {
            if (Schema::hasColumn('user_lesson_result', 'list_word_answer_id')) {
                $table->dropColumn('list_word_answer_id');
            }

            if (!Schema::hasColumn('user_lesson_result', 'word_answer_wrong_id_1')) {
                $table->integer('word_answer_wrong_id_1')->unsigned();
            }

            if (!Schema::hasColumn('user_lesson_result', 'word_answer_wrong_id_2')) {
                $table->integer('word_answer_wrong_id_2')->unsigned();
            }

            if (!Schema::hasColumn('user_lesson_result', 'word_answer_wrong_id_3')) {
                $table->integer('word_answer_wrong_id_3')->unsigned();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_lesson_result', function (Blueprint $table) {
            if (Schema::hasColumn('user_lesson_result', 'word_answer_wrong_id_1')) {
                $table->dropColumn('word_answer_wrong_id_1');
            }

            if (Schema::hasColumn('user_lesson_result', 'word_answer_wrong_id_2')) {
                $table->dropColumn('word_answer_wrong_id_2');
            }

            if (Schema::hasColumn('user_lesson_result', 'word_answer_wrong_id_3')) {
                $table->dropColumn('word_answer_wrong_id_3');
            }

            if (!Schema::hasColumn('user_lesson_result', 'list_word_answer_id')) {
                $table->string('list_word_answer_id');
            }
        });
    }
}
