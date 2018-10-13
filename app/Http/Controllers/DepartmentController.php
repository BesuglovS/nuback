<?php

namespace App\Http\Controllers;

use App\DomainClasses\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function all() {
        return Department::all();
    }

    public function add(Request $request) {
        $newDepartment = new Department();

        $newDepartment->name = $request->name ?? "";

        $newDepartment->save();

        return $newDepartment->id;
    }

    public function get($id) {
        return Department::find($id);
    }

    public function update($id, Request $request) {
        $Department = Department::find($id);

        if (!is_null($request->name)) $Department->name = $request->name;

        $Department->save();

        return $Department->id;
    }

    public function delete($id) {
        return Department::destroy($id);
    }
}
