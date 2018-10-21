<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearningPlanDisciplineSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_plan_discipline_semesters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semester');
            $table->integer('lecture_hours');
            $table->integer('lab_hours');
            $table->integer('practice_hours');
            $table->integer('independent_work_hours');
            $table->integer('control_hours');
            $table->integer('z_count');
            $table->boolean('zachet');
            $table->boolean('exam');
            $table->boolean('zachet_with_mark');
            $table->boolean('course_project');
            $table->boolean('course_task');
            $table->boolean('control_task');

            $table->integer('learning_plan_discipline_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_plan_discipline_semesters');
    }
}
