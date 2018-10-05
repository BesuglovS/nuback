<?php

namespace App\Http\Controllers;

use App\DomainClasses\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function all() {
        return Faculty::all();
    }

    public function add(Request $request) {
        $newFaculty = new Faculty();

        $newFaculty->name = $request->name ?? "";
        $newFaculty->letter = $request->letter ?? "";
        $newFaculty->sorting_order = $request->sorting_order ?? "";

        $newFaculty->save();

        return $newFaculty->id;
    }

    public function get($id) {
        return Faculty::find($id);
    }

    public function update($id, Request $request) {
        $Faculty = Faculty::find($id);

        if (!is_null($request->name)) $Faculty->name = $request->name;
        if (!is_null($request->letter)) $Faculty->letter = $request->letter;
        if (!is_null($request->sorting_order)) $Faculty->sorting_order = $request->sorting_order;

        $Faculty->save();

        return $Faculty->id;
    }

    public function delete($id) {
        return Faculty::destroy($id);
    }
}
