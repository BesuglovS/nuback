<?php

namespace App\Http\Controllers;

use App\DomainClasses\PositionYearRateHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionYearRateHoursController extends Controller
{
    public function all() {
        return PositionYearRateHours::all();
    }

    public function add(Request $request) {
        $newPositionYearRateHours = new PositionYearRateHours();

        $newPositionYearRateHours->year = $request->year ?? "";
        $newPositionYearRateHours->position = $request->position ?? "";
        $newPositionYearRateHours->rate_hours = $request->rate_hours ?? "";

        $newPositionYearRateHours->save();

        return $newPositionYearRateHours->id;
    }

    public function get($id) {
        return PositionYearRateHours::find($id);
    }

    public function update($id, Request $request) {
        $PositionYearRateHours = PositionYearRateHours::find($id);

        if (!is_null($request->year)) $PositionYearRateHours->year = $request->year;
        if (!is_null($request->position)) $PositionYearRateHours->position = $request->position;
        if (!is_null($request->rate_hours)) $PositionYearRateHours->rate_hours = $request->rate_hours;

        $PositionYearRateHours->save();

        return $PositionYearRateHours->id;
    }

    public function delete($id) {
        return PositionYearRateHours::destroy($id);
    }

    public function allYears() {
        $PositionYearRateHours = new PositionYearRateHours();
        $pyrhTableName = $PositionYearRateHours->getTable();

        $result = array_column(DB::table($pyrhTableName)
            ->distinct()
            ->get(['year'])
            ->toArray(),
            'year');

        return $result;
    }

    public function year($year) {
        $PositionYearRateHours = new PositionYearRateHours();
        $pyrhTableName = $PositionYearRateHours->getTable();

        $result = DB::table($pyrhTableName)
            ->where('year', '=', $year)
            ->get();

        return $result;
    }
}
