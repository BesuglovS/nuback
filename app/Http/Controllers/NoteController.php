<?php

namespace App\Http\Controllers;

use App\DomainClasses\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function all() {
        return Note::all();
    }

    public function add(Request $request) {
        $newNote = new Note();

        $newNote->text = $request->text ?? "";

        $newNote->save();

        return $newNote->id;
    }

    public function get($id) {
        return Note::find($id);
    }

    public function update($id, Request $request) {
        $Note = Note::find($id);

        if (!is_null($request->text)) $Note->text = $request->text;

        $Note->save();

        return $Note->id;
    }

    public function delete($id) {
        return Note::destroy($id);
    }
}
