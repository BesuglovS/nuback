<?php

namespace App\Http\Controllers;

use App\DomainClasses\DepartmentHead;
use Illuminate\Http\Request;

class DepartmentHeadController extends Controller
{
    public function all() {
        return DepartmentHead::all();
    }

    public function add(Request $request) {
        $newDepartmentHead = new DepartmentHead();

        $newDepartmentHead->department_id = $request->department_id ?? "";
        $newDepartmentHead->teacher_id = $request->teacher_id ?? "";
        $newDepartmentHead->from = $request->from ?? "";
        $newDepartmentHead->to = $request->to ?? "";

        $newDepartmentHead->save();

        return $newDepartmentHead->id;
    }

    public function get($id) {
        return DepartmentHead::find($id);
    }

    public function update($id, Request $request) {
        $DepartmentHead = DepartmentHead::find($id);

        if (!is_null($request->department_id)) $DepartmentHead->department_id = $request->department_id;
        if (!is_null($request->teacher_id)) $DepartmentHead->teacher_id = $request->teacher_id;
        if (!is_null($request->from)) $DepartmentHead->from = $request->from;
        if (!is_null($request->to)) $DepartmentHead->to = $request->to;

        $DepartmentHead->save();

        return $DepartmentHead->id;
    }

    public function delete($id) {
        return DepartmentHead::destroy($id);
    }
}
