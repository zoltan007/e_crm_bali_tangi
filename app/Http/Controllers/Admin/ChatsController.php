<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ChatsController extends Controller
{
    public function chats(){
        Session::put('page','chats');

        return view('admin.live_chats.live_chats');
    }
}
