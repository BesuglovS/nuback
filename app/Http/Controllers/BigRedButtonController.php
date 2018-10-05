<?php

namespace App\Http\Controllers;

use App\DomainClasses\Student;
use App\DomainClasses\StudentStudentGroup;
use App\DomainClasses\StudentGroup;
use App\DomainClasses\Teacher;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BigRedButtonController extends Controller
{
    public function importStudentsAndGroups()
    {
        $students = DB::select("SELECT StudentId, F, I, O, ZachNumber, BirthDate, Address, Phone, Orders, Starosta, NFactor, PaidEdu, Expelled FROM students;");

        $studentIds = [];
        foreach ($students as $student) {
            $st = new Student();

            $st->f = $student->F;
            $st->i = $student->I;
            $st->o = $student->O;
            $st->zach_number = $student->ZachNumber;
            $st->birth_date = $student->BirthDate;
            $st->address = $student->Address;
            $st->phone = $student->Phone;
            $st->orders = $student->Orders;
            $st->starosta = $student->Starosta;
            $st->n_factor = $student->NFactor;
            $st->paid_edu = $student->PaidEdu;
            $st->expelled = $student->Expelled;

            $st->save();

            $studentIds[$student->StudentId] = $st->id;
        }

        $studentGroups = DB::select("SELECT StudentGroupId, Name FROM studentGroups");
        $studentGroupIds = [];
        foreach ($studentGroups as $studentGroup) {
            $sg = new StudentGroup();

            $sg->name = $studentGroup->Name;
            $sg->from = $date = new DateTime('2018-09-01');
            $sg->to = $date = new DateTime('2019-08-31');

            $sg->save();

            $studentGroupIds[$studentGroup->StudentGroupId] = $sg->id;
        }

        $studentInGroups = DB::select("SELECT StudentId, StudentGroupId FROM studentsInGroups");
        foreach ($studentInGroups as $sig) {
            $ssg = new StudentStudentGroup();

            $ssg->student_id = $studentIds[$sig->StudentId];
            $ssg->student_group_id = $studentGroupIds[$sig->StudentGroupId];
            $ssg->from = date_create('2018-09-01');
            $ssg->to = date_create('2019-08-31');

            $ssg->save();
        }

        $teachers = DB::select("SELECT FIO, Phone FROM teachers");
        foreach ($teachers as $teacher) {
            $t = new Teacher();

            $fioPieces = explode(" ", $teacher->FIO);
            $t->f = $fioPieces[0];
            $t->i = $fioPieces[1];
            $t->o = $fioPieces[2];

            $t->phone = $teacher->Phone;
            $t->birth_date = date_create('1970-01-01');

            $t->save();
        }

        return "OK :-)";
    }
}
