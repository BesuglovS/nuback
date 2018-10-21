<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearningPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('speciality_code');
            $table->string('speciality_name');
            $table->string('profile');
            $table->integer('starting_year');
            $table->string('education_standard');
            $table->integer('faculty_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_plans');
    }
}
