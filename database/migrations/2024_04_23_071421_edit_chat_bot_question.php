<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('chat_bot_questions', function (Blueprint $table) {
            $table->dropColumn('question_number');
            $table->dropColumn('question');
            $table->text('question');
            $table->string('category');
            $table->text('answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_bot_questions', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('answer');
            $table->string('question_number')->unique();
            $table->string('question');
        });
    }
};
