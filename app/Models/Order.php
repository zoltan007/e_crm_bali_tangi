<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orders_detail(){
        return $this->hasMany('App\Models\OrdersDetail','order_id');
    }

  
}
