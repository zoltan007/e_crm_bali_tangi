<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;


class CouponsController extends Controller
{
    public function coupon(){
        $getCouponItems = Coupon::where('status',1)->get()->toArray();
        return view('front.products.coupons_offer')->with(compact('getCouponItems'));
    }
}
