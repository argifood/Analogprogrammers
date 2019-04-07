<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class areacode extends Model
{
    public $timestamps = false;
    
    public function listing()
    {
        return $this->hasmany('App\listing', 'listing');
    }
    public function statshour()
    {
        return $this->hasmany('App\statshour', 'statshour');
    }
}