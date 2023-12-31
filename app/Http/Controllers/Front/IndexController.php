<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;

class IndexController extends Controller
{
     public function index(){
     $sliderBanners = Banner::where('type','Slider')->where('status',1)->get()->toArray();
     $fixBanners = Banner::where('type','Fix')->where('status',1)->get()->toArray();
      $featuredProducts = Product::with('category', 'attributes')->where(['is_featured'=>'Yes','status'=>1])->limit(8)->get()->toArray();
      $bestSellers = Product::where(['is_bestseller'=>'Yes','status'=>1])->inRandomOrder()->get()->toArray();
      return view('front.index')->with(compact('sliderBanners', 'fixBanners', 'featuredProducts', 'bestSellers'));
     }
}
