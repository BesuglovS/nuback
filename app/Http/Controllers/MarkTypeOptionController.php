<?php

namespace App\Http\Controllers;

use App\DomainClasses\MarkTypeOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkTypeOptionController extends Controller
{
    public function all() {
        return MarkTypeOption::all();
    }

    public function add(Request $request) {
        $newMarkTypeOption = new MarkTypeOption();

        $newMarkTypeOption->mark_type_id = $request->mark_type_id ?? "";
        $newMarkTypeOption->mark = $request->mark ?? "";

        $newMarkTypeOption->save();

        return $newMarkTypeOption->id;
    }

    public function get($id) {
        return MarkTypeOption::find($id);
    }

    public function update($id, Request $request) {
        $MarkTypeOption = MarkTypeOption::find($id);

        if (!is_null($request->mark_type_id)) $MarkTypeOption->mark_type_id = $request->mark_type_id;
        if (!is_null($request->mark)) $MarkTypeOption->mark = $request->mark;

        $MarkTypeOption->save();

        return $MarkTypeOption->id;
    }

    public function delete($id) {
        return MarkTypeOption::destroy($id);
    }

    public function markTypeAll($markTypeId) {
        $MarkTypeOption = new MarkTypeOption();
        $mtoTableName = $MarkTypeOption->getTable();

        $result = DB::table($mtoTableName)
            ->where(['mark_type_id' => $markTypeId])
            ->get();

        return $result;
    }
}
