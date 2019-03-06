<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    //
    protected $table = 'order_items';
    protected $primaryKey = 'order_items_id';

    public function items()
    {
        return $this->hasMany('App\Item', 'item_id');
    }
}
