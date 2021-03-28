<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'user_id',
        'group_id',
        'advisor_id',
        'project_name',
        'date_create',
    ];
}
