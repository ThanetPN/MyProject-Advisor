<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Feture;

class Topic extends Model
{
    protected $fillable = [
        'user_id',
        'group_id',
        'advisor_id',
        'project_name',
        'date_create',
    ];

    public function relation_feture() 
    {
        return $this->hasMany(Feture::class);
    }
}
