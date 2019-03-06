<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    public function FareInfo()
    {
    	return $this->belongsTo('App\Fare', 'id', 'city_id');
    }
}
