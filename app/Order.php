<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $primaryKey = 'order_id';

    public function item()
    {
        return $this->hasOne('App\Order_item', 'order_id');
    }

    public function items()
    {
        return $this->hasMany('App\Order_item', 'order_id');
    }

    public function design()
    {
       return $this->hasOne('App\Design', 'design_id');
    }

    public function design_metas()
    {
       return $this->hasMany('App\Design_meta', 'design_id');
    }

    public function metas()
    {
        return $this->hasMany('App\Order_meta', 'order_id');
    }

    public function payment()
    {
        return $this->hasOne('App\Order_payment', 'order_id');
    }
}
