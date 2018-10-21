<?php

namespace App\Http\Controllers;

use App\DomainClasses\LearningPlan;
use Illuminate\Http\Request;

class LearningPlanController extends Controller
{
    public function all() {
        return LearningPlan::all();
    }

    public function add(Request $request) {
        $newLearningPlan = new LearningPlan();

        $newLearningPlan->speciality_code = $request->speciality_code ?? "";
        $newLearningPlan->speciality_name = $request->speciality_name ?? "";
        $newLearningPlan->profile = $request->profile ?? "";
        $newLearningPlan->starting_year = $request->starting_year ?? "";
        $newLearningPlan->education_standard = $request->education_standard ?? "";
        $newLearningPlan->faculty_id = $request->faculty_id ?? "";

        $newLearningPlan->save();

        return $newLearningPlan->id;
    }

    public function get($id) {
        return LearningPlan::find($id);
    }

    public function update($id, Request $request) {
        $LearningPlan = LearningPlan::find($id);

        if (!is_null($request->speciality_code)) $LearningPlan->speciality_code = $request->speciality_code;
        if (!is_null($request->speciality_name)) $LearningPlan->speciality_name = $request->speciality_name;
        if (!is_null($request->profile)) $LearningPlan->profile = $request->profile;
        if (!is_null($request->starting_year)) $LearningPlan->starting_year = $request->starting_year;
        if (!is_null($request->education_standard)) $LearningPlan->education_standard = $request->education_standard;
        if (!is_null($request->faculty_id)) $LearningPlan->faculty_id = $request->faculty_id;

        $LearningPlan->save();

        return $LearningPlan->id;
    }

    public function delete($id) {
        return LearningPlan::destroy($id);
    }
}
