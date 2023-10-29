<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public static function getCouponItems(){
            
        $getCouponItems = Coupon::orderBy('id','Desc')->get()->toArray();
        
        return $getCouponItems;
    }
}
