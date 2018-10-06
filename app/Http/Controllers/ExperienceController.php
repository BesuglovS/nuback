<?php

namespace App\Http\Controllers;

use App\DomainClasses\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function all() {
        return Experience::all();
    }

    public function add(Request $request) {
        $newExperience = new Experience();

        $newExperience->type = $request->type ?? "";
        $newExperience->duration = $request->duration ?? "";
        $newExperience->date = $request->date ?? "";
        $newExperience->teacher_id = $request->teacher_id ?? "";

        $newExperience->save();

        return $newExperience->id;
    }

    public function get($id) {
        return Experience::find($id);
    }

    public function update($id, Request $request) {
        $Experience = Experience::find($id);

        if (!is_null($request->type)) $Experience->type = $request->type;
        if (!is_null($request->duration)) $Experience->duration = $request->duration;
        if (!is_null($request->type)) $Experience->type = $request->type;
        if (!is_null($request->teacher_id)) $Experience->teacher_id = $request->teacher_id;

        $Experience->save();

        return $Experience->id;
    }

    public function delete($id) {
        return Experience::destroy($id);
    }
}
