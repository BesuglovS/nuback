<?php

namespace App\DomainClasses;

use Illuminate\Database\Eloquent\Model;

class StudentStudentGroup extends Model
{
    public $timestamps = false;

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function student_group() {
        return $this->belongsTo(StudentGroup::class);
    }
}
