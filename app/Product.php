<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function product_order()
    {
        return $this->hasMany('App\ProductOrder');
    }
}
