<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function listing()
    {
        return $this->hasmany('App\listing', 'listing');
    }
    public function statshour()
    {
        return $this->hasmany('App\statshour', 'statshour');
    }
}
