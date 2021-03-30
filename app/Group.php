<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Group;
use App\Member;
use App\Topic;
use App\Feture;
use Auth;

class Group extends Model
{
    protected $fillable = [
        'user_id',
        'title',
    ];

    public function relation_member()
    {
        $get_data = $this->hasMany(Member::class, 'group_id', 'id')
            ->with('relation_users');
        return $get_data;
    }

    public function relation_users()
    {
        return $this->hasOne(User::class, 'id', 'member_id');
    }

    public function relation_topic() 
    {
        $get_data = $this->hasOne(Topic::class, 'group_id', 'id')
            ->with('relation_feture');
        return $get_data;
    }
}
