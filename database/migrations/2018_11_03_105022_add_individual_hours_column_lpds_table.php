<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndividualHoursColumnLpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('learning_plan_discipline_semesters', function (Blueprint $table) {
            $table->integer('individual_hours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('learning_plan_discipline_semesters', function (Blueprint $table) {
            $table->dropColumn('individual_hours');
        });
    }
}
