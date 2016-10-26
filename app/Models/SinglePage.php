<?php

namespace App\Models;

use App\Models\Admin\Database\Administrator;
use Illuminate\Database\Eloquent\Model;

class SinglePage extends Model
{
    //
    protected $fillable = [
        'admin_user_id',
        'type',
        'title',
        'content',
        'publish_date'
    ];

    public function owner(){
        return $this->belongsTo(Administrator::class, 'admin_user_id', 'id');
    }
}
