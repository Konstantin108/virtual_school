<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')
                ->constrained('themes')
                ->cascadeOnDelete();
            $table->string('text', 1000)->nullable();
            $table->string('answer_1', 1000)->nullable();
            $table->string('answer_2', 1000)->nullable();
            $table->string('answer_3', 1000)->nullable();
            $table->string('answer_4', 1000)->nullable();
            $table->string('correct_answer', 1000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
