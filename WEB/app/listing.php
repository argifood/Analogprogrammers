<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listing extends Model
{

    public function product()
    {
        return $this->belongsTo('App\product', 'product_id');
    }
    public function areacode()
    {
        return $this->belongsTo('App\areacode', 'areacode_id');
    }
    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }
    public function buyer()
    {
        return $this->belongsTo('App\User', 'buyer_id');
    }
}


