<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use Image;

class CategoryController extends Controller
{
    public function categories(){
        Session::put('page','categories');
        $categories = Category::get()->toArray();
        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    public function addEditCategory(Request $request, $id=null){
        Session::put('page','categories');
        if($id==""){
            // Add Category Functionality
            $title = "Tambahkan kategori produk";
            $category = new Category;
            $getCategories = array();
            $message = "Kategori produk berhasil ditambahkan";
        }else{
            // Edit Category Functionality
            $title = "Edit kategori produk";
            $category = Category::find($id);
            $message = "Kategori berhasil diperbarui";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            $rules = [
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
            ];

            $customMessages = [
                'category_name.required' => 'Nama kategori produk harus dimasukkan',
                'category_name.regex' => 'Nama kategori produk harus valid',
            ];

            $this->validate($request,$rules,$customMessages);

            if($data['category_discount']==""){
                $data['category_discount'] = 0;    
            }
        
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->status = 1;
            $category->save();

            return redirect('admin/categories')->with('success_message',$message);
                        
        }

        return view('admin.categories.add_edit_category')->with(compact('title','category'));

    }

    public function deleteCategory($id){
        // Delete Category
        Category::where('id',$id)->delete();
        $message = "Kategori produk berhasil dihapus";
        return redirect()->back()->with('success_message',$message);
    }

}
