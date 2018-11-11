<?php

namespace App\Http\Controllers;

use App\DomainClasses\TeacherCard;
use App\DomainClasses\TeacherCardItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherCardItemController extends Controller
{
    public function all() {
        return TeacherCardItem::all();
    }

    public function add(Request $request) {
        $newTeacherCardItem = new TeacherCardItem();

        $newTeacherCardItem->semester = $request->semester ?? "";
        $newTeacherCardItem->code = $request->code ?? "";
        $newTeacherCardItem->discipline_name = $request->discipline_name ?? "";
        $newTeacherCardItem->group_name = $request->group_name ?? "";
        $newTeacherCardItem->group_count = $request->group_count ?? "";
        $newTeacherCardItem->group_students_count = $request->group_students_count ?? "";
        $newTeacherCardItem->lecture_hours = $request->lecture_hours ?? "";
        $newTeacherCardItem->lab_hours = $request->lab_hours ?? "";
        $newTeacherCardItem->practice_hours = $request->practice_hours ?? "";
        $newTeacherCardItem->exam_hours = $request->exam_hours ?? "";
        $newTeacherCardItem->zach_hours = $request->zach_hours ?? "";
        $newTeacherCardItem->zach_with_mark_hours = $request->zach_with_mark_hours ?? "";
        $newTeacherCardItem->course_project_hours = $request->course_project_hours ?? "";
        $newTeacherCardItem->course_task_hours = $request->course_task_hours ?? "";
        $newTeacherCardItem->control_task_hours = $request->control_task_hours ?? "";
        $newTeacherCardItem->referat_hours = $request->referat_hours ?? "";
        $newTeacherCardItem->essay_hours = $request->essay_hours ?? "";
        $newTeacherCardItem->head_of_practice_hours = $request->head_of_practice_hours ?? "";
        $newTeacherCardItem->head_of_vkr_hours = $request->head_of_vkr_hours ?? "";
        $newTeacherCardItem->iga_hours = $request->iga_hours ?? "";
        $newTeacherCardItem->nra_hours = $request->nra_hours ?? "";
        $newTeacherCardItem->nrm_hours = $request->nrm_hours ?? "";
        $newTeacherCardItem->individual_hours = $request->individual_hours ?? "";
        $newTeacherCardItem->teacher_card_id = $request->teacher_card_id ?? "";

        $newTeacherCardItem->save();

        return $newTeacherCardItem->id;
    }

    public function get($id) {
        return TeacherCardItem::find($id);
    }

    public function update($id, Request $request) {
        $TeacherCardItem = TeacherCardItem::find($id);

        if (!is_null($request->semester)) $TeacherCardItem->semester = $request->semester;
        if (!is_null($request->code)) $TeacherCardItem->code = $request->code;
        if (!is_null($request->discipline_name)) $TeacherCardItem->discipline_name = $request->discipline_name;
        if (!is_null($request->group_name)) $TeacherCardItem->group_name = $request->group_name;
        if (!is_null($request->group_count)) $TeacherCardItem->group_count = $request->group_count;
        if (!is_null($request->group_students_count)) $TeacherCardItem->group_students_count = $request->group_students_count;
        if (!is_null($request->lecture_hours)) $TeacherCardItem->lecture_hours = $request->lecture_hours;
        if (!is_null($request->lab_hours)) $TeacherCardItem->lab_hours = $request->lab_hours;
        if (!is_null($request->practice_hours)) $TeacherCardItem->practice_hours = $request->practice_hours;
        if (!is_null($request->exam_hours)) $TeacherCardItem->exam_hours = $request->exam_hours;
        if (!is_null($request->zach_hours)) $TeacherCardItem->zach_hours = $request->zach_hours;
        if (!is_null($request->zach_with_mark_hours)) $TeacherCardItem->zach_with_mark_hours = $request->zach_with_mark_hours;
        if (!is_null($request->course_project_hours)) $TeacherCardItem->course_project_hours = $request->course_project_hours;
        if (!is_null($request->course_task_hours)) $TeacherCardItem->course_task_hours = $request->course_task_hours;
        if (!is_null($request->control_task_hours)) $TeacherCardItem->control_task_hours = $request->control_task_hours;
        if (!is_null($request->referat_hours)) $TeacherCardItem->referat_hours = $request->referat_hours;
        if (!is_null($request->essay_hours)) $TeacherCardItem->essay_hours = $request->essay_hours;
        if (!is_null($request->head_of_practice_hours)) $TeacherCardItem->head_of_practice_hours = $request->head_of_practice_hours;
        if (!is_null($request->head_of_vkr_hours)) $TeacherCardItem->head_of_vkr_hours = $request->head_of_vkr_hours;
        if (!is_null($request->iga_hours)) $TeacherCardItem->iga_hours = $request->iga_hours;
        if (!is_null($request->nra_hours)) $TeacherCardItem->nra_hours = $request->nra_hours;
        if (!is_null($request->nrm_hours)) $TeacherCardItem->nrm_hours = $request->nrm_hours;
        if (!is_null($request->individual_hours)) $TeacherCardItem->individual_hours = $request->individual_hours;
        if (!is_null($request->teacher_card_id)) $TeacherCardItem->teacher_card_id = $request->teacher_card_id;


        $TeacherCardItem->save();

        return $TeacherCardItem->id;
    }

    public function delete($id) {
        return TeacherCardItem::destroy($id);
    }

    public function teacherCardAll($teacherCardId) {
        $TeacherCardItem = new TeacherCardItem();
        $tciTableName = $TeacherCardItem->getTable();

        $result = DB::table($tciTableName)
            ->where('teacher_card_id', '=', $teacherCardId)
            ->get();

        return $result;
    }

    public function teacherAll($teacherId) {
        $TeacherCard = new TeacherCard();
        $tcTableName = $TeacherCard->getTable();

        $cards = DB::table($tcTableName)
            ->where('teacher_id', '=', $teacherId)
            ->get();

        $result = [];

        foreach ($cards as $card)
        {
            $TeacherCardItem = new TeacherCardItem();
            $tcTableName = $TeacherCardItem->getTable();

            $cardResult = DB::table($tcTableName)
                ->where('teacher_card_id', '=', $card->id)
                ->get()
                ->toArray();

            $result = array_merge($result, $cardResult);
        }

        return $result;
    }
}
