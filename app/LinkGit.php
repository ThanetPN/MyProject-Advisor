<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkGit extends Model
{
    protected $fillable = [
        'topic_id',
        'name',
        'link',
    ];
}
