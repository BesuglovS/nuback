<?php

namespace App\Http\Controllers;

use App\DomainClasses\FacultyStudentGroup;
use Illuminate\Http\Request;

class FacultyStudentGroupController extends Controller
{
    public function all() {
        return FacultyStudentGroup::all();
    }

    public function add(Request $request) {
        $newFacultyStudentGroup = new FacultyStudentGroup();

        $newFacultyStudentGroup->faculty_id = $request->faculty_id ?? "";
        $newFacultyStudentGroup->student_group_id = $request->student_group_id ?? "";

        $newFacultyStudentGroup->save();

        return $newFacultyStudentGroup->id;
    }

    public function get($id) {
        return FacultyStudentGroup::find($id);
    }

    public function update($id, Request $request) {
        $FacultyStudentGroup = FacultyStudentGroup::find($id);

        if (!is_null($request->faculty_id)) $FacultyStudentGroup->faculty_id = $request->faculty_id;
        if (!is_null($request->student_group_id)) $FacultyStudentGroup->student_group_id = $request->student_group_id;

        $FacultyStudentGroup->save();

        return $FacultyStudentGroup->id;
    }

    public function delete($id) {
        return FacultyStudentGroup::destroy($id);
    }
}
