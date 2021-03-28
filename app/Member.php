<?php

namespace App;

use App\User;
use App\Group;
use App\Topic;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'group_id',
    ];

    public function relation_users()
    {
        return $this->hasOne(User::class, 'id', 'member_id');
    }

    public function relation_group()
    {
        return $this->hasMany(Topic::class, 'group_id', 'group_id');
    }
}
