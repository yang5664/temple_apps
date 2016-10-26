<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'admin_user_id',
        'type',
        'title',
        'content'
    ];

    protected $hidden = [

    ];
}
