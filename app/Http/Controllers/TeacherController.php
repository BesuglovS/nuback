<?php

namespace App\Http\Controllers;

use App\DomainClasses\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function all() {
        return Teacher::all();
    }

    public function add(Request $request) {
        $newTeacher = new Teacher();

        $newTeacher->f = $request->f ?? "";
        $newTeacher->i = $request->i ?? "";
        $newTeacher->o = $request->o ?? "";
        $newTeacher->phone = $request->phone ?? "";
        $newTeacher->birth_date = $request->birth_date ?? "";

        $newTeacher->save();

        return $newTeacher->id;
    }

    public function get($id) {
        return Teacher::find($id);
    }

    public function update($id, Request $request) {
        $Teacher = Teacher::find($id);

        if (!is_null($request->f)) $Teacher->f = $request->f;
        if (!is_null($request->i)) $Teacher->i = $request->i;
        if (!is_null($request->o)) $Teacher->o = $request->o;
        if (!is_null($request->phone)) $Teacher->phone = $request->phone;
        if (!is_null($request->birth_date)) $Teacher->birth_date = $request->birth_date;

        $Teacher->save();

        return $Teacher->id;
    }

    public function delete($id) {
        return Teacher::destroy($id);
    }
}
