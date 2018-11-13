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

    public function rateHours($year, $departmentId)
    {
        $result = [];
        $result["rate_values"] = [];
        $result["position_not_found"] = [];

        $tcc = new TeacherCardController();
        $cards = $tcc->yearDepartmentId($year, $departmentId);

        $pyhr = new PositionYearRateHoursController();
        $positionRates = $pyhr->year($year);

        $tci = new TeacherCardItemController();

        foreach ($cards as $card)
        {
            $position = strtolower($card->position);

            $positionFound = false;

            foreach ($positionRates as $pRate)
            {
                if ($position == $pRate->position)
                {
                    $positionFound = true;
                    $TeacherCardItems = $tci->teacherCardAll($card->id);

                    $tcHours = "0.00";
                    foreach ($TeacherCardItems as $item)
                    {
                        $tcHours = bcadd($tcHours, $item->lecture_hours, 2);
                        $tcHours = bcadd($tcHours, $item->lab_hours, 2);
                        $tcHours = bcadd($tcHours, $item->practice_hours, 2);
                        $tcHours = bcadd($tcHours, $item->exam_hours, 2);
                        $tcHours = bcadd($tcHours, $item->zach_hours, 2);
                        $tcHours = bcadd($tcHours, $item->zach_with_mark_hours, 2);
                        $tcHours = bcadd($tcHours, $item->course_project_hours, 2);
                        $tcHours = bcadd($tcHours, $item->course_task_hours, 2);
                        $tcHours = bcadd($tcHours, $item->control_task_hours, 2);
                        $tcHours = bcadd($tcHours, $item->referat_hours, 2);
                        $tcHours = bcadd($tcHours, $item->essay_hours, 2);
                        $tcHours = bcadd($tcHours, $item->head_of_practice_hours, 2);
                        $tcHours = bcadd($tcHours, $item->head_of_vkr_hours, 2);
                        $tcHours = bcadd($tcHours, $item->iga_hours, 2);
                        $tcHours = bcadd($tcHours, $item->nra_hours, 2);
                        $tcHours = bcadd($tcHours, $item->nrm_hours, 2);
                        $tcHours = bcadd($tcHours, $item->individual_hours, 2);
                    }

                    if (array_key_exists($position, $result["rate_values"]))
                    {
                        $rateMultiplier = $tcHours / $pRate->rate_hours;
                        $result["rate_values"][$position]["2"] = bcadd($result["rate_values"][$position]["2"], round($rateMultiplier, 2), 2);
                        $result["rate_values"][$position]["3"] = bcadd($result["rate_values"][$position]["3"], round($rateMultiplier, 3), 3);
                    }
                    else
                    {
                        $rateMultiplier = $tcHours / $pRate->rate_hours;
                        $result["rate_values"][$position]["2"] = bcadd(round($rateMultiplier, 2), 0, 2);
                        $result["rate_values"][$position]["3"] = bcadd(round($rateMultiplier, 3), 0, 3);
                    }
                }
            }

            if (!$positionFound) {
                $result["position_not_found"][] = $card;
            }
        }

        $rates = [];

        foreach ($result["rate_values"] as $position => $positionRates)
        {
            $rate = [];
            $rate["position"] = $position;
            $rate["2"] = $positionRates["2"];
            $rate["3"] = $positionRates["3"];

            $rates[] = $rate;
        }

        $result["rate_values"] = $rates;

        return $result;
    }
}
