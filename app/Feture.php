<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feture extends Model
{
    protected $fillable = [
        'topic_id',
        'title',
        'content',
        'date_create',
        'status',
        'image'
    ];
}
