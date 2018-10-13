<?php

namespace App\Http\Controllers;

use App\DomainClasses\AcademicDegree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicDegreeController extends Controller
{
    public function all() {
        return AcademicDegree::all();
    }

    public function add(Request $request) {
        $newAcademicDegree = new AcademicDegree();

        $newAcademicDegree->degree = $request->degree ?? "";
        $newAcademicDegree->science_field = $request->science_field ?? "";
        $newAcademicDegree->date = $request->date ?? "";
        $newAcademicDegree->teacher_id = $request->teacher_id ?? "";

        $newAcademicDegree->save();

        return $newAcademicDegree->id;
    }

    public function get($id) {
        return AcademicDegree::find($id);
    }

    public function update($id, Request $request) {
        $AcademicDegree = AcademicDegree::find($id);

        if (!is_null($request->degree)) $AcademicDegree->degree = $request->degree;
        if (!is_null($request->science_field)) $AcademicDegree->science_field = $request->science_field;
        if (!is_null($request->date)) $AcademicDegree->date = $request->date;
        if (!is_null($request->teacher_id)) $AcademicDegree->teacher_id = $request->teacher_id;

        $AcademicDegree->save();

        return $AcademicDegree->id;
    }

    public function delete($id) {
        return AcademicDegree::destroy($id);
    }

    public function teacherAll($teacherId) {
        $AcademicDegree = new AcademicDegree();
        $adTableName = $AcademicDegree->getTable();

        $result = DB::table($adTableName)
            ->where('teacher_id', '=', $teacherId)
            ->get();

        return $result;
    }
}
