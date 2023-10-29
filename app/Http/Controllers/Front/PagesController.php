<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
         
        return view('front.about');
     }

    public function contact(){
         
        return view('front.contact_us');
     }
}
