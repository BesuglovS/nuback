<?php

namespace App\Http\Controllers;

use App\DomainClasses\TeacherCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherCardController extends Controller
{
    public function all() {
        return TeacherCard::all();
    }

    public function add(Request $request) {
        $newTeacherCard = new TeacherCard();

        $newTeacherCard->teacher_id = $request->teacher_id ?? "";
        $newTeacherCard->position = $request->position ?? "";
        $newTeacherCard->academic_degree = $request->academic_degree ?? "";
        $newTeacherCard->academic_rank = $request->academic_rank ?? "";
        $newTeacherCard->department_rank = $request->department_rank ?? "";
        $newTeacherCard->department_id = $request->department_id ?? "";
        $newTeacherCard->position_type = $request->position_type ?? "";

        $newTeacherCard->save();

        return $newTeacherCard->id;
    }

    public function get($id) {
        return TeacherCard::find($id);
    }

    public function update($id, Request $request) {
        $TeacherCard = TeacherCard::find($id);

        if (!is_null($request->teacher_id)) $TeacherCard->teacher_id = $request->teacher_id;
        if (!is_null($request->position)) $TeacherCard->position = $request->position;
        if (!is_null($request->academic_degree)) $TeacherCard->academic_degree = $request->academic_degree;
        if (!is_null($request->academic_rank)) $TeacherCard->academic_rank = $request->academic_rank;
        if (!is_null($request->department_rank)) $TeacherCard->department_rank = $request->department_rank;
        if (!is_null($request->department_id)) $TeacherCard->department_id = $request->department_id;
        if (!is_null($request->position_type)) $TeacherCard->position_type = $request->position_type;


        $TeacherCard->save();

        return $TeacherCard->id;
    }

    public function delete($id) {
        return TeacherCard::destroy($id);
    }

    public function teacherAll($teacherId) {
        $TeacherCard = new TeacherCard();
        $tcTableName = $TeacherCard->getTable();

        $result = DB::table($tcTableName)
            ->where('teacher_id', '=', $teacherId)
            ->get();

        return $result;
    }
}
