<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function listing()
    {
        return $this->hasmany('App\listing', 'listing');
    }
}
