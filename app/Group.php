<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Group;
use App\Member;

class Group extends Model
{
    protected $fillable = [
        'user_id',
        'title',
    ];
}
