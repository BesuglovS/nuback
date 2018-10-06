<?php

namespace App\Http\Controllers;

use App\DomainClasses\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function all() {
        return Education::all();
    }

    public function add(Request $request) {
        $newEducation = new Education();

        $newEducation->level = $request->level ?? "";
        $newEducation->specialty = $request->specialty ?? "";
        $newEducation->qualification = $request->qualification ?? "";
        $newEducation->year = $request->year ?? "";
        $newEducation->teacher_id = $request->teacher_id ?? "";

        $newEducation->save();

        return $newEducation->id;
    }

    public function get($id) {
        return Education::find($id);
    }

    public function update($id, Request $request) {
        $Education = Education::find($id);

        if (!is_null($request->level)) $Education->level = $request->level;
        if (!is_null($request->specialty)) $Education->specialty = $request->specialty;
        if (!is_null($request->qualification)) $Education->qualification = $request->qualification;
        if (!is_null($request->year)) $Education->year = $request->year;
        if (!is_null($request->teacher_id)) $Education->teacher_id = $request->teacher_id;

        $Education->save();

        return $Education->id;
    }

    public function delete($id) {
        return Education::destroy($id);
    }
}
