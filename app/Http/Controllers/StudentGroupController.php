<?php

namespace App\Http\Controllers;

use App\DomainClasses\FacultyStudentGroup;
use App\DomainClasses\StudentGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentGroupController extends Controller
{
    public function all() {
        return StudentGroup::all();
    }

    public function add(Request $request) {
        $newStudentGroup = new StudentGroup();

        $newStudentGroup->name = $request->name ?? "";
        $newStudentGroup->from = $request->from ?? "";
        $newStudentGroup->to = $request->to ?? "";

        $newStudentGroup->save();

        return $newStudentGroup->id;
    }

    public function get($id) {
        return StudentGroup::find($id);
    }

    public function facultyAll($facultyId) {
        $fsg = new FacultyStudentGroup();
        $fsgTablename = $fsg->getTable();
        $sg = new StudentGroup();
        $sgTablename = $sg->getTable();

        $result = DB::table($fsgTablename)
            ->where('faculty_id', '=', $facultyId)
            ->join($sgTablename, 'student_group_id', '=', $sgTablename . '.id')
            ->get();

        return $result;
    }

    public function update($id, Request $request) {
        $studentGroup = StudentGroup::find($id);

        if (!is_null($request->name)) $studentGroup->name = $request->name;
        if (!is_null($request->from)) $studentGroup->from = $request->from;
        if (!is_null($request->to)) $studentGroup->to = $request->to;

        $studentGroup->save();

        return $studentGroup->id;
    }

    public function delete($id) {
        return StudentGroup::destroy($id);
    }
}
