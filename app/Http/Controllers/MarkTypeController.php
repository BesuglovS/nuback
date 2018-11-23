<?php

namespace App\Http\Controllers;

use App\DomainClasses\MarkType;
use Illuminate\Http\Request;

class MarkTypeController extends Controller
{
    public function all() {
        return MarkType::all();
    }

    public function add(Request $request) {
        $newMarkType = new MarkType();

        $newMarkType->name = $request->name ?? "";

        $newMarkType->save();

        return $newMarkType->id;
    }

    public function get($id) {
        return MarkType::find($id);
    }

    public function update($id, Request $request) {
        $MarkType = MarkType::find($id);

        if (!is_null($request->name)) $MarkType->name = $request->name;

        $MarkType->save();

        return $MarkType->id;
    }

    public function delete($id) {
        return MarkType::destroy($id);
    }
}
