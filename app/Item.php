<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $primaryKey = 'item_id';

    public function metas()
    {
        return $this->hasMany('App\Item_meta', 'item_id');
    }
}
