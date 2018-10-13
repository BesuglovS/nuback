<?php

namespace App\Http\Controllers;

use App\DomainClasses\AcademicRank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicRankController extends Controller
{
    public function all() {
        return AcademicRank::all();
    }

    public function add(Request $request) {
        $newAcademicRank = new AcademicRank();

        $newAcademicRank->rank = $request->rank ?? "";
        $newAcademicRank->date = $request->date ?? "";
        $newAcademicRank->teacher_id = $request->teacher_id ?? "";

        $newAcademicRank->save();

        return $newAcademicRank->id;
    }

    public function get($id) {
        return AcademicRank::find($id);
    }

    public function update($id, Request $request) {
        $AcademicRank = AcademicRank::find($id);

        if (!is_null($request->rank)) $AcademicRank->rank = $request->rank;
        if (!is_null($request->date)) $AcademicRank->date = $request->date;
        if (!is_null($request->teacher_id)) $AcademicRank->teacher_id = $request->teacher_id;

        $AcademicRank->save();

        return $AcademicRank->id;
    }

    public function delete($id) {
        return AcademicRank::destroy($id);
    }

    public function teacherAll($teacherId) {
        $AcademicRank = new AcademicRank();
        $arTableName = $AcademicRank->getTable();

        $result = DB::table($arTableName)
            ->where('teacher_id', '=', $teacherId)
            ->get();

        return $result;
    }
}
