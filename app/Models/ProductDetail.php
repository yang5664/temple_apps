<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //

    protected $fillable = ['product_id', 'image', 'name',
      'memo', 'memo2', 'spec', 'price', 'qty'];
}
