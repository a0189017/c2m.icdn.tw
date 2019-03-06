<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $primaryKey = 'design_id';
    //
    public function item()
    {
        return $this->hasOne('App\Item', 'item_id', 'item_id');
    }

    public function metas()
    {
        return $this->hasMany('App\Design_meta', 'design_id');
    }
}
