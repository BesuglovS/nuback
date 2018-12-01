<?php

namespace App\Http\Controllers;

use App\DomainClasses\LearningPlan;
use App\DomainClasses\LearningPlanDiscipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LearningPlanDisciplineController extends Controller
{
    public function all() {
        return LearningPlanDiscipline::all();
    }

    public function add(Request $request) {
        $newLearningPlanDiscipline = new LearningPlanDiscipline();

        $newLearningPlanDiscipline->code = $request->code ?? "";
        $newLearningPlanDiscipline->name = $request->name ?? "";
        $newLearningPlanDiscipline->total_hours = $request->total_hours ?? "";
        $newLearningPlanDiscipline->contact_work_hours = $request->contact_work_hours ?? "";
        $newLearningPlanDiscipline->independent_work_hours = $request->independent_work_hours ?? "";
        $newLearningPlanDiscipline->control_hours = $request->control_hours ?? "";
        $newLearningPlanDiscipline->z_count = $request->z_count ?? "";
        $newLearningPlanDiscipline->learning_plan_id = $request->learning_plan_id ?? "";
        $newLearningPlanDiscipline->order = $request->order ?? "";

        $newLearningPlanDiscipline->save();

        return $newLearningPlanDiscipline->id;
    }

    public function get($id) {
        return LearningPlanDiscipline::find($id);
    }

    public function update($id, Request $request) {
        $LearningPlanDiscipline = LearningPlanDiscipline::find($id);

        if (!is_null($request->code)) $LearningPlanDiscipline->code = $request->code;
        if (!is_null($request->name)) $LearningPlanDiscipline->name = $request->name;
        if (!is_null($request->total_hours)) $LearningPlanDiscipline->total_hours = $request->total_hours;
        if (!is_null($request->contact_work_hours)) $LearningPlanDiscipline->contact_work_hours = $request->contact_work_hours;
        if (!is_null($request->independent_work_hours)) $LearningPlanDiscipline->independent_work_hours = $request->independent_work_hours;
        if (!is_null($request->control_hours)) $LearningPlanDiscipline->control_hours = $request->control_hours;
        if (!is_null($request->z_count)) $LearningPlanDiscipline->z_count = $request->z_count;
        if (!is_null($request->learning_plan_id)) $LearningPlanDiscipline->learning_plan_id = $request->learning_plan_id;
        if (!is_null($request->order)) $LearningPlanDiscipline->order = $request->order;

        $LearningPlanDiscipline->save();

        return $LearningPlanDiscipline->id;
    }

    public function delete($id) {
        return LearningPlanDiscipline::destroy($id);
    }

    public function learningPlanAll($learningPlanId)
    {
        $LearningPlanDiscipline = new LearningPlanDiscipline();
        $lpdTableName = $LearningPlanDiscipline->getTable();

        $result = DB::table($lpdTableName)
            ->where('learning_plan_id', '=', $learningPlanId)
            ->get();

        return $result;
    }
}
