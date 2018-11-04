<?php

namespace App\Http\Controllers;

use App\DomainClasses\StudentLearningPlan;
use Illuminate\Http\Request;

class StudentLearningPlanController extends Controller
{
    public function all() {
        return StudentLearningPlan::all();
    }

    public function add(Request $request) {
        $newStudentLearningPlan = new StudentLearningPlan();

        $newStudentLearningPlan->student_id = $request->student_id ?? "";
        $newStudentLearningPlan->learning_plan_id = $request->learning_plan_id ?? "";
        $newStudentLearningPlan->from = $request->from ?? "";
        $newStudentLearningPlan->to = $request->to ?? "";

        $newStudentLearningPlan->save();

        return $newStudentLearningPlan->id;
    }

    public function get($id) {
        return StudentLearningPlan::find($id);
    }

    public function update($id, Request $request) {
        $StudentLearningPlan = StudentLearningPlan::find($id);

        if (!is_null($request->student_id)) $StudentLearningPlan->student_id = $request->student_id;
        if (!is_null($request->learning_plan_id)) $StudentLearningPlan->learning_plan_id = $request->learning_plan_id;
        if (!is_null($request->from)) $StudentLearningPlan->from = $request->from;
        if (!is_null($request->to)) $StudentLearningPlan->to = $request->to;

        $StudentLearningPlan->save();

        return $StudentLearningPlan->id;
    }

    public function delete($id) {
        return StudentLearningPlan::destroy($id);
    }
}
