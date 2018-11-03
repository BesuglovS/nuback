<?php

namespace App\Http\Controllers;

use App\DomainClasses\LearningPlanDisciplineSemester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LearningPlanDisciplineSemesterController extends Controller
{
    public function all() {
        return LearningPlanDisciplineSemester::all();
    }

    public function add(Request $request) {
        $newLearningPlanDisciplineSemester = new LearningPlanDisciplineSemester();

        $newLearningPlanDisciplineSemester->semester = $request->semester ?? "";
        $newLearningPlanDisciplineSemester->lecture_hours = $request->lecture_hours ?? "";
        $newLearningPlanDisciplineSemester->lab_hours = $request->lab_hours ?? "";
        $newLearningPlanDisciplineSemester->practice_hours = $request->practice_hours ?? "";
        $newLearningPlanDisciplineSemester->independent_work_hours = $request->independent_work_hours ?? "";
        $newLearningPlanDisciplineSemester->control_hours = $request->control_hours ?? "";
        $newLearningPlanDisciplineSemester->z_count = $request->z_count ?? "";
        $newLearningPlanDisciplineSemester->zachet = $request->zachet ?? "";
        $newLearningPlanDisciplineSemester->exam = $request->exam ?? "";
        $newLearningPlanDisciplineSemester->zachet_with_mark = $request->zachet_with_mark ?? "";
        $newLearningPlanDisciplineSemester->course_project = $request->course_project ?? "";
        $newLearningPlanDisciplineSemester->course_task = $request->course_task ?? "";
        $newLearningPlanDisciplineSemester->control_task = $request->control_task ?? "";
        $newLearningPlanDisciplineSemester->referat = $request->referat ?? "";
        $newLearningPlanDisciplineSemester->essay = $request->essay ?? "";
        $newLearningPlanDisciplineSemester->learning_plan_discipline_id = $request->learning_plan_discipline_id ?? "";

        $newLearningPlanDisciplineSemester->save();

        return $newLearningPlanDisciplineSemester->id;
    }

    public function get($id) {
        return LearningPlanDisciplineSemester::find($id);
    }

    public function update($id, Request $request) {
        $LearningPlanDisciplineSemester = LearningPlanDisciplineSemester::find($id);

        if (!is_null($request->semester)) $LearningPlanDisciplineSemester->semester = $request->semester;
        if (!is_null($request->lecture_hours)) $LearningPlanDisciplineSemester->lecture_hours = $request->lecture_hours;
        if (!is_null($request->lab_hours)) $LearningPlanDisciplineSemester->lab_hours = $request->lab_hours;
        if (!is_null($request->practice_hours)) $LearningPlanDisciplineSemester->practice_hours = $request->practice_hours;
        if (!is_null($request->independent_work_hours)) $LearningPlanDisciplineSemester->independent_work_hours = $request->independent_work_hours;
        if (!is_null($request->control_hours)) $LearningPlanDisciplineSemester->control_hours = $request->control_hours;
        if (!is_null($request->z_count)) $LearningPlanDisciplineSemester->z_count = $request->z_count;
        if (!is_null($request->zachet)) $LearningPlanDisciplineSemester->zachet = $request->zachet;
        if (!is_null($request->exam)) $LearningPlanDisciplineSemester->exam = $request->exam;
        if (!is_null($request->zachet_with_mark)) $LearningPlanDisciplineSemester->zachet_with_mark = $request->zachet_with_mark;
        if (!is_null($request->course_project)) $LearningPlanDisciplineSemester->course_project = $request->course_project;
        if (!is_null($request->course_task)) $LearningPlanDisciplineSemester->course_task = $request->course_task;
        if (!is_null($request->control_task)) $LearningPlanDisciplineSemester->control_task = $request->control_task;
        if (!is_null($request->referat)) $LearningPlanDisciplineSemester->referat = $request->referat;
        if (!is_null($request->essay)) $LearningPlanDisciplineSemester->essay = $request->essay;
        if (!is_null($request->learning_plan_discipline_id)) $LearningPlanDisciplineSemester->learning_plan_discipline_id = $request->learning_plan_discipline_id;

        $LearningPlanDisciplineSemester->save();

        return $LearningPlanDisciplineSemester->id;
    }

    public function delete($id) {
        return LearningPlanDisciplineSemester::destroy($id);
    }

    public function learningPlanDisciplineAll($learningPlanDisciplineId)
    {
        $LearningPlanDisciplineSemester = new LearningPlanDisciplineSemester();
        $lpdsTableName = $LearningPlanDisciplineSemester->getTable();

        $result = DB::table($lpdsTableName)
            ->where('learning_plan_discipline_id', '=', $learningPlanDisciplineId)
            ->get();

        return $result;
    }

}
