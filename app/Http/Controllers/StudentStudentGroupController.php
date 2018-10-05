<?php

namespace App\Http\Controllers;

use App\DomainClasses\StudentStudentGroup;
use Illuminate\Http\Request;

class StudentStudentGroupController extends Controller
{
    public function all() {
        return StudentStudentGroup::all();
    }

    public function add(Request $request) {
        $newStudentStudentGroup = new StudentStudentGroup();

        $newStudentStudentGroup->student_id = $request->student_id ?? "";
        $newStudentStudentGroup->student_group_id = $request->student_group_id ?? "";
        $newStudentStudentGroup->from = $request->from ?? "";
        $newStudentStudentGroup->to = $request->to ?? "";

        $newStudentStudentGroup->save();

        return $newStudentStudentGroup->id;
    }

    public function get($id) {
        return StudentStudentGroup::find($id);
    }

    public function update($id, Request $request) {
        $studentStudentGroup = StudentStudentGroup::find($id);

        if (!is_null($request->student_id)) $studentStudentGroup->student_id = $request->student_id;
        if (!is_null($request->student_group_id)) $studentStudentGroup->student_group_id = $request->student_group_id;
        if (!is_null($request->from)) $studentStudentGroup->from = $request->from;
        if (!is_null($request->to)) $studentStudentGroup->to = $request->to;

        $studentStudentGroup->save();

        return $studentStudentGroup->id;
    }

    public function delete($id) {
        return StudentStudentGroup::destroy($id);
    }
}
