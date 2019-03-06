<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    protected $table = 'zipcode';

    public function CityInfo()
    {
    	return $this->belongsTo('App\City', 'city_id');
    }
}
