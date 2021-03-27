<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class GroupController extends Controller
{
    public function get_users () {
        $users = User::all();
        return response()->json($users);
    }
}
