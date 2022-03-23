<?php

use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answer_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SurveyQuestion::class, 'survey_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(SurveyAnswer::class, 'survey_id')->constrained()->onDelete('cascade');
            $table->text('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_answer_questions');
    }
};
