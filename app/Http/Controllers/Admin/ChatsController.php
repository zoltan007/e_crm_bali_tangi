<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Session;

class ChatsController extends Controller
{
    public function chats(){
        Session::put('page','live_chats');

        return view('admin.chats.live_chats');
    }
}
