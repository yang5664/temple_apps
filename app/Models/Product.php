<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function detail(){
        return $this->hasMany('App\Models\ProductDetail');
    }
}
