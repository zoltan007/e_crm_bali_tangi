<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Newsletter;

class NewslettersController extends Controller
{
    public function subscribe(Request $request){
        $request->validate([
            'subscriber_email'=>'required|email'
        ]);
        try {
            if(Newsletter::isSubscribed($request->subscriber_email)){
                return redirect()->back()->with('error_message', 'Anda sudah melakukan subscribe sebelumnya');
            }else{
                Newsletter::subscribe($request->subscriber_email);
                return redirect()->back()->with('success_message', 'Anda berhasil melakukan subscribe newsletter');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
