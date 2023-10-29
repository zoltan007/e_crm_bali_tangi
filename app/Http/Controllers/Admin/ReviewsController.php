<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Session;

class ReviewsController extends Controller
{
    public function reviews(){
        Session::put('page','reviews');
        $reviews = Review::with(['user','product'])->get()->toArray();

        return view('admin.reviews.reviews')->with(compact('reviews'));
    }

    public function updateReviewStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;                
            }else {
                $status = 1;
            }
            Review::where('id', $data['review_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'review_id'=>$data['review_id']]);
        }        
    }
   
}
