<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Session;

class NewslettersController extends Controller
{
    public function newsletters(){
        Session::put('page','newsletters');

        return view('admin.newsletters.newsletters');
    }
}
