<?php

namespace App\Http\Controllers;

use App\DomainClasses\MarkTeacher;
use App\DomainClasses\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkTeacherController extends Controller
{
    public function all() {
        return MarkTeacher::all();
    }

    public function add(Request $request) {
        $newMarkTeacher = new MarkTeacher();

        $newMarkTeacher->mark_id = $request->mark_id ?? "";
        $newMarkTeacher->teacher_id = $request->teacher_id ?? "";

        $newMarkTeacher->save();

        return $newMarkTeacher->id;
    }

    public function get($id) {
        return MarkTeacher::find($id);
    }

    public function update($id, Request $request) {
        $MarkTeacher = MarkTeacher::find($id);

        if (!is_null($request->mark_id)) $MarkTeacher->mark_id = $request->mark_id;
        if (!is_null($request->teacher_id)) $MarkTeacher->teacher_id = $request->teacher_id;

        $MarkTeacher->save();

        return $MarkTeacher->id;
    }

    public function delete($id) {
        return MarkTeacher::destroy($id);
    }

    public function markAll($markId) {
        $MarkTeacher = new MarkTeacher();
        $mtTableName = $MarkTeacher->getTable();

        $Teacher = new Teacher();
        $tTableName = $Teacher->getTable();

        $result = DB::table($mtTableName)
            ->where(['mark_id' => $markId])
            ->join($tTableName, 'teacher_id', '=', $tTableName . '.id')
            ->select($tTableName . '.f', $tTableName . '.i', $tTableName . '.o', $mtTableName . '.*')
            ->get();

        return $result;
    }
}
