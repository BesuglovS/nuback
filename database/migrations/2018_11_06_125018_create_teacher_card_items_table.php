<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherCardItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_card_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semester');
            $table->string('code');
            $table->string('discipline_name');
            $table->string('group_name');
            $table->integer('group_count');
            $table->integer('group_students_count');
            $table->decimal('lecture_hours', 11, 2);
            $table->decimal('lab_hours', 11, 2);
            $table->decimal('practice_hours', 11, 2);
            $table->decimal('exam_hours', 11, 2);
            $table->decimal('zach_hours', 11, 2);
            $table->decimal('zach_with_mark_hours', 11, 2);
            $table->decimal('course_project_hours', 11, 2);
            $table->decimal('course_task_hours', 11, 2);
            $table->decimal('control_task_hours', 11, 2);
            $table->decimal('referat_hours', 11, 2);
            $table->decimal('essay_hours', 11, 2);
            $table->decimal('head_of_practice_hours', 11, 2);
            $table->decimal('head_of_vkr_hours', 11, 2);
            $table->decimal('iga_hours', 11, 2);
            $table->decimal('nra_hours', 11, 2);
            $table->decimal('nrm_hours', 11, 2);
            $table->integer('teacher_card_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_card_items');
    }
}
