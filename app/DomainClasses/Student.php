<?php

namespace App\DomainClasses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    public $timestamps = false;

    public static function ListOfNotExpelled()
    {
        return DB::table('students')
            ->where('expelled', '=', 0)
            ->get();
    }
}
