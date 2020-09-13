<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product_order()
    {
        return $this->hasMany('App\ProductOrder');
    }
}
