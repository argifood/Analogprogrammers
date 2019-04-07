<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statshour extends Model
{
    public function product()
    {
        return $this->belongsTo('App\product', 'product_id');
    }
    public function areacode()
    {
        return $this->belongsTo('App\areacode', 'areacodes_id');
    }
}
