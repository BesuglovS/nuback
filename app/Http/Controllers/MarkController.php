<?php

namespace App\Http\Controllers;

use App\DomainClasses\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    public function all() {
        return Mark::all();
    }

    public function add(Request $request) {
        $newMark = new Mark();

        $newMark->student_id = $request->student_id ?? "";
        $newMark->learning_plan_discipline_semester_id = $request->learning_plan_discipline_semester_id ?? "";
        $newMark->attestation_type = $request->attestation_type ?? "";
        $newMark->mark_type_id = $request->mark_type_id ?? "";
        $newMark->mark_type_option_id = $request->mark_type_option_id ?? "";
        $newMark->date = $request->date ?? "";
        $newMark->attempt = $request->attempt ?? "";
        $newMark->attestation_mark_type_option_id = $request->attestation_mark_type_option_id ?? "";
        $newMark->semester_rate = $request->semester_rate ?? "";

        $newMark->save();

        return $newMark->id;
    }

    public function get($id) {
        return Mark::find($id);
    }

    public function update($id, Request $request) {
        $Mark = Mark::find($id);

        if (!is_null($request->student_id)) $Mark->student_id = $request->student_id;
        if (!is_null($request->learning_plan_discipline_semester_id)) $Mark->learning_plan_discipline_semester_id = $request->learning_plan_discipline_semester_id;
        if (!is_null($request->attestation_type)) $Mark->attestation_type = $request->attestation_type;
        if (!is_null($request->mark_type_id)) $Mark->mark_type_id = $request->mark_type_id;
        if (!is_null($request->mark_type_option_id)) $Mark->mark_type_option_id = $request->mark_type_option_id;
        if (!is_null($request->date)) $Mark->date = $request->date;
        if (!is_null($request->attempt)) $Mark->attempt = $request->attempt;
        if (!is_null($request->attestation_mark_type_option_id)) $Mark->attestation_mark_type_option_id = $request->attestation_mark_type_option_id;
        if (!is_null($request->semester_rate)) $Mark->semester_rate = $request->semester_rate;

        $Mark->save();

        return $Mark->id;
    }

    public function delete($id) {
        return Mark::destroy($id);
    }

    public function studentAll($studentId) {
        $Mark = new Mark();
        $mTableName = $Mark->getTable();

        $result = DB::table($mTableName)
            ->where(['student_id' => $studentId])
            ->get();

        return $result;
    }
}
