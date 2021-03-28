<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Topic;
use App\User;

class TopicController extends Controller
{
    public function get_select_advisor() {
        $users = User::all()->where('user_role', '=', 'Teacher');
        return response()->json($users);
    }
}
