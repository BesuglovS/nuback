<?php

namespace App\Http\Controllers;

use App\DomainClasses\LearningPlan;
use App\DomainClasses\Student;
use App\DomainClasses\StudentLearningPlan;
use App\DomainClasses\StudentStudentGroup;
use App\DomainClasses\StudentGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function all() {
        return Student::all();
    }

    public function add(Request $request) {
        $newStudent = new Student();

        $newStudent->f = $request->f ?? "";
        $newStudent->i = $request->i ?? "";
        $newStudent->o = $request->o ?? "";
        $newStudent->zach_number = $request->zach_number ?? "";
        $newStudent->birth_date = $request->birth_date ?? "";
        $newStudent->address = $request->address ?? "";
        $newStudent->phone = $request->phone ?? "";
        $newStudent->orders = $request->orders ?? "";
        $newStudent->starosta = $request->starosta ?? "";
        $newStudent->n_factor = $request->n_factor ?? "";
        $newStudent->paid_edu = $request->paid_edu ?? "";
        $newStudent->expelled = $request->expelled ?? "";

        $newStudent->save();

        return $newStudent->id;
    }

    public function get($id) {
        return Student::find($id);
    }

    public function update($id, Request $request) {
        $student = Student::find($id);

        if (!is_null($request->f)) $student->f = $request->f;
        if (!is_null($request->i)) $student->i = $request->i;
        if (!is_null($request->o)) $student->o = $request->o;
        if (!is_null($request->zach_number)) $student->zach_number = $request->zach_number;
        if (!is_null($request->birth_date)) $student->birth_date = $request->birth_date;
        if (!is_null($request->address)) $student->address = $request->address;
        if (!is_null($request->phone)) $student->phone = $request->phone;
        if (!is_null($request->orders)) $student->orders = $request->orders;
        if (!is_null($request->starosta)) $student->starosta = $request->starosta;
        if (!is_null($request->n_factor)) $student->n_factor = $request->n_factor;
        if (!is_null($request->paid_edu)) $student->paid_edu = $request->paid_edu;
        if (!is_null($request->expelled)) $student->expelled = $request->expelled;

        $student->save();

        return $student->id;
    }

    public function delete($id) {
        return Student::destroy($id);
    }

    public function groupAll($groupId) {
        $ssg = new StudentStudentGroup();
        $ssgTablename = $ssg->getTable();
        $st = new Student();
        $sTablename = $st->getTable();

        $result = DB::table($ssgTablename)
            ->where('student_group_id', '=', $groupId)
            ->join($sTablename, 'student_id', '=', $sTablename . '.id')
            ->get();

        return $result;
    }

    public function groups($studentId) {
        $ssg = new StudentStudentGroup();
        $ssgTablename = $ssg->getTable();
        $sg = new StudentGroup();
        $sgTablename = $sg->getTable();

        $result = DB::table($ssgTablename)
            ->where('student_id', '=', $studentId)
            ->join($sgTablename, 'student_group_id', '=', 'student_groups.id')
            ->select($sgTablename . '.id', $sgTablename . '.name')
            ->get()
            ->map(function($item) {
                $group = new StudentGroup();
                $group->id = $item->id;
                $group->name = $item->name;
                return $group;
            })
            ->toArray();

        return $result;
    }

    public function learningPlans($studentId) {
        $slp = new StudentLearningPlan();
        $slpTablename = $slp->getTable();
        $lp = new LearningPlan();
        $lpTablename = $lp->getTable();

        $result = DB::table($slpTablename)
            ->where('student_id', '=', $studentId)
            ->join($lpTablename, 'learning_plan_id', '=', 'learning_plans.id')
            ->get();

        return $result;
    }
}
