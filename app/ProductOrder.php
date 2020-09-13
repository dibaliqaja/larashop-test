<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function orders()
    {
        return $this->belongsTo('App\Order');
    }
}
