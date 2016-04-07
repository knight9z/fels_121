<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameFieldsInWordAnswerLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('word_answer_locales', function (Blueprint $table) {
            if (Schema::hasColumn('word_answer_locales', 'content')) {
                $table->renameColumn('content', 'content_answer');
            };

            if (Schema::hasColumn('word_answer_locales', 'notes')) {
                $table->renameColumn('notes', 'note_answer');
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
        Schema::table('word_answer_locales', function (Blueprint $table) {
            if (Schema::hasColumn('word_answer_locales', 'content_answer')) {
                $table->renameColumn('content_answer', 'content');
            };

            if (Schema::hasColumn('word_answer_locales', 'note_answer')) {
                $table->renameColumn('note_answer', 'notes');
            };
        });
    }
}
