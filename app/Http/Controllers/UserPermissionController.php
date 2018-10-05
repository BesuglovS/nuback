<?php

namespace App\Http\Controllers;

use App\DomainClasses\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPermissionController extends Controller
{
    public function all() {
        return UserPermission::all();
    }

    public function add(Request $request) {
        $up = new UserPermission();

        $up->username = $request->username ?? "";
        $up->permissions = $request->permissions ?? "";
        $up->realname = $request->realname ?? "";

        $up->save();

        return $up->id;
    }

    public function get($id) {
        return UserPermission::find($id);
    }

    public function update($id, Request $request) {
        $up = UserPermission::find($id);

        if (!is_null($up->username)) $up->username = $request->username;
        if (!is_null($up->permissions)) $up->permissions = $request->permissions;
        if (!is_null($up->realname)) $up->realname = $request->realname;

        $up->save();

        return $up->id;
    }

    public function delete($id) {
        return UserPermission::destroy($id);
    }

    public function getByName($username) {
        $up = new UserPermission();
        $upTablename = $up->getTable();
        $up = DB::table($upTablename)
            ->where('username', '=', $username)
            ->first();
        if ($up == null) {
            return [];
        }
        else {
            return explode('@', $up->permissions);
        }
    }
}
