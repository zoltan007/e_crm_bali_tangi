<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\User;
use App\Models\Category;
use Session;
use Auth;


class CouponsController extends Controller
{
    public function coupons(){
        Session::put('page','coupons');
        $adminType = Auth::guard('admin')->user()->type;     
        $coupons = Coupon::get()->toArray();     
        
        return view('admin.coupons.coupons')->with(compact('coupons'));
    }

    public function updateCouponStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Coupon::where('id',$data['coupon_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'coupon_id'=>$data['coupon_id']]);
        }
    }

    public function deleteCoupon($id){
        // Delete Coupon
        Coupon::where('id',$id)->delete();
        $message = "Kupon berhasil dihapus";
        return redirect()->back()->with('success_message',$message);
    }

    public function addEditCoupon(Request $request,$id=null){
        if($id==""){
            // Add Coupon
            $title = "Tambah Kupon";
            $coupon = new Coupon;
            $selCats = array();
            $selUsers = array();
            $message = "Kupon berhasil ditambahkan";
        }else{
            // Update Coupon
            $title = "Edit Coupon";
            $coupon = Coupon::find($id);
            $selCats = explode(',',$coupon['categories']);
            $selUsers = explode(',',$coupon['users']);
            $message = "Kupon berhasil diperbarui";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'categories' => 'required',
                'coupon_option' => 'required',
                'coupon_type' => 'required',
                'amount_type' => 'required',
                'amount' => 'required|numeric',
                'expiry_date' => 'required',
            ];

            $customMessages = [
                'categories.required' => 'Pilih kategori produk',
                'coupon_option.required' => 'Pilih opsi kupon',
                'coupon_type.required' => 'Pilih tipe kupon',
                'amount_type.required' => 'Pilih jenis jumlah harga',
                'amount.required' => 'Masukkan jumlah harga',
                'amount.numeric' => 'Masukkan jumlah harga yang valid',
                'expiry_date.required' => 'Masukkan tanggal berakhir kupon',
            ];

            $this->validate($request,$rules,$customMessages);

            if(isset($data['categories'])){
                $categories = implode(",",$data['categories']);
            }else{
                $categories = "";
            }

            if(isset($data['users'])){
                $users = implode(",",$data['users']);
            }else{
                $users = "";
            }

            if($data['coupon_option']=="Automatic"){
                $coupon_code = str_random(8);
            }else{
                $coupon_code = $data['coupon_code'];
            }

            $adminType = Auth::guard('admin')->user()->type;

            $coupon->coupon_option = $data['coupon_option'];
            $coupon->coupon_code = $coupon_code;
            $coupon->categories = $categories;
            $coupon->users = $users;
            $coupon->coupon_type = $data['coupon_type'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->amount = $data['amount'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->status = 1;
            $coupon->save();
            return redirect('admin/coupons')->with('success_message',$message);
        }

         // Get All Categories
         $categories = Category::where('status',1)->get()->toArray();

        // Get All User Emails
        $users = User::select('email')->where('status',1)->get();

        return view('admin.coupons.add_edit_coupon')->with(compact('title','coupon','categories','users','selCats','selUsers'));
    }
}
