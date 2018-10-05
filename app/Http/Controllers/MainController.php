<?php

namespace App\Http\Controllers;

use App\DomainClasses\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function passwordhash($password) {
        $hashed = Hash::make($password);
        return $hashed;
    }

    public function main(Request $request) {
        ini_set('max_execution_time', 60);

        $input = $request->all();

        $action = $input["action"];

        $correctActions = ["list"];

        if (!in_array($action, $correctActions))
        {
            return array("error" => "Неизвестное действие (action)");
        }

        switch ($action) {
            case "list":
                if(!isset($input['listtype']))
                {
                    return array("error" => "listtype - обязательный параметр при list запросе.");
                }
                else
                {
                    $listType = $input["listtype"];
                }

                $correctListType = ["students"];

                if (!in_array($listType, $correctListType))
                {
                    return array("error" => "Неизвестный тип списка (listtype)");
                }

                switch ($listType) {
                    case "students":
                        return $this->GetStudentsList();
                }

                break;
        }

        return array("error" => "Whoops, looks like something went wrong :-)");
    }

    private function GetStudentsList()
    {
        $result =  Student::ListOfNotExpelled();

        return $result;
    }
}
