<?php

namespace App\Http\Controllers;

use App\DomainClasses\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function all() {
        return Position::all();
    }

    public function add(Request $request) {
        $newPosition = new Position();

        $newPosition->type = $request->type ?? "";
        $newPosition->position = $request->position ?? "";
        $newPosition->department = $request->department ?? "";
        $newPosition->order = $request->order ?? "";
        $newPosition->elected = $request->elected ?? "";
        $newPosition->election_protocol = $request->election_protocol ?? "";

        $newPosition->save();

        return $newPosition->id;
    }

    public function get($id) {
        return Position::find($id);
    }

    public function update($id, Request $request) {
        $Position = Position::find($id);

        if (!is_null($request->type)) $Position->type = $request->type;
        if (!is_null($request->position)) $Position->position = $request->position;
        if (!is_null($request->department)) $Position->department = $request->department;
        if (!is_null($request->order)) $Position->order = $request->order;
        if (!is_null($request->elected)) $Position->elected = $request->elected;
        if (!is_null($request->election_protocol)) $Position->election_protocol = $request->election_protocol;

        $Position->save();

        return $Position->id;
    }

    public function delete($id) {
        return Position::destroy($id);
    }
}
