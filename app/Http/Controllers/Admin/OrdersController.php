<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersDetail;
use App\Models\OrderStatus;
use App\Models\User;
use Session;
use Auth;

class OrdersController extends Controller
{
    public function orders(){
        Session::put('page','orders');
        $orders = Order::with('orders_detail')->orderBy('id','Desc')->get()->toArray();    
        return view('admin.orders.orders')->with(compact('orders'));
    }

    public function orderDetails($id){
        Session::put('page','orders');
        $orderDetails = Order::with('orders_detail')->where('id',$id)->first()->toArray();    
            
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
        $orderStatuses = OrderStatus::where('status',1)->get()->toArray();
        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails','orderStatuses'));
    }

    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            // Update Order Status
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
           
            $message = "Status pesanan berhasil diperbarui";
            return redirect()->back()->with('success_message',$message);
        }
    }

    public function viewOrderInvoice($order_id){
        $orderDetails = Order::with('orders_detail')->where('id',$order_id)->first()->toArray();
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
        return view('admin.orders.order_invoice')->with(compact('orderDetails','userDetails'));
    }
}
