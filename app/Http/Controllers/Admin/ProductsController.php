<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsImage;
use App\Models\ProductsAttribute;
use Session;
use Auth;
use Image;

class ProductsController extends Controller
{
    public function products(){
        Session::put('page','products');
        $products = Product::with(['category'=>function($query){
            $query->select('id','category_name');
        }])->get()->toArray();
        return view('admin.products.products')->with(compact('products'));
    }

    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }

    public function deleteProduct($id){
        // Delete Product
        Product::where('id',$id)->delete();
        $message = "Produk telah berhasil dihapus";
        return redirect()->back()->with('success_message',$message);
    }

    public function addEditProduct(Request $request, $id=null){
        Session::put('page','products');
        if($id==""){
            $title = "Add Product";
            $product = new Product;
            $message = "Produk telah berhasil ditambahkan";
        }else{
            $title = "Edit Product";
            $product = Product::find($id);
            /*echo "<pre>"; print_r($product); die;*/
            $message = "Produk telah berhasil diperbarui";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            $rules = [
                'category_id' => 'required',
                'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
            ];

            $customMessages = [
                'category_id.required' => 'Kategori produk harus dimasukkan',
                'product_name.required' => 'Nama produk harus dimasukkan',
                'product_name.regex' => 'Nama produk yang dimasukkan harus valid',
                'product_price.required' => 'Harga produk harus dimasukkan',
            ];

            $this->validate($request,$rules,$customMessages);

            if($data['product_discount']==""){
                $data['product_discount'] = 0;    
            }

            // Upload Product Image after Resize small: 250x250 medium: 500x500 large: 1000x1000
            if($request->hasFile('product_image')){
                $image_tmp = $request->file('product_image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $largeImagePath = 'front/images/product_images/large/'.$imageName;
                    $mediumImagePath = 'front/images/product_images/medium/'.$imageName;
                    $smallImagePath = 'front/images/product_images/small/'.$imageName;
                    // Upload the Large, Medium and Small Images after Resize
                    Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                    // Insert Image Name in products table
                    $product->product_image = $imageName;
                }
            }

            // Save Product details in products table
            $categoryDetails = Category::find($data['category_id']);
            $product->category_id = $data['category_id'];
            
            $product->product_name = $data['product_name'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->stock = $data['stock'];
            $product->description = $data['description'];
            if(!empty($data['is_featured'])){
                $product->is_featured = $data['is_featured'];
            }else{
                $product->is_featured = "No";
            }
            $product->status = 1;
            $product->save();
            return redirect('admin/products')->with('success_message',$message);
        }

        $categories = Category::where('status',1)->get()->toArray();

        return view('admin.products.add_edit_product')->with(compact('title','categories','product'));
    }

    public function deleteProductImage($id){
        // Get product image
        $productImage = Product::select('product_image')->where('id',$id)->first();

        // Get Product Image Paths
        $small_image_path = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path = 'front/images/product_images/large/';
    
        // Delete Product small image if exists in small folder
        if(file_exists($small_image_path.$productImage->product_image)){
            unlink($small_image_path.$productImage->product_image);
        }

        // Delete Product medium image if exists in medium folder
        if(file_exists($medium_image_path.$productImage->product_image)){
            unlink($medium_image_path.$productImage->product_image);
        }

        // Delete Product large image if exists in large folder
        if(file_exists($large_image_path.$productImage->product_image)){
            unlink($large_image_path.$productImage->product_image);
        }

        // Delete Product image from products table
        Product::where('id',$id)->update(['product_image'=>'']);

        $message = "Gambar produk telah berhasil dihapus";
        return redirect()->back()->with('success_message',$message);

    }

    public function addImages($id, Request $request){
        Session::put('page','products');
        $product = Product::select('id','product_name','product_price','product_image')->with('images')->find($id); 

        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('images')){
                $images = $request->file('images');
                /*echo "<pre>"; print_r($images); die;*/
                foreach ($images as $key => $image) {
                    // Generate Temp Image
                    $image_tmp = Image::make($image);
                    // Get Image Name
                    $image_name = $image->getClientOriginalName();
                    // Get Image Extension
                    $extension = $image->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = $image_name.rand(111,99999).'.'.$extension;
                    $largeImagePath = 'front/images/product_images/large/'.$imageName;
                    $mediumImagePath = 'front/images/product_images/medium/'.$imageName;
                    $smallImagePath = 'front/images/product_images/small/'.$imageName;
                    // Upload the Large, Medium and Small Images after Resize
                    Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                    // Insert Image Name in products table
                    $image = new ProductsImage; 
                    $image->image = $imageName;
                    $image->product_id = $id;
                    $image->status = 1;
                    $image->save();
                }
            }
            return redirect()->back()->with('success_message','Gambar produk telah berhasil ditambahkan');
        }

        return view('admin.images.add_images')->with(compact('product'));
    }

    public function updateImageStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            ProductsImage::where('id',$data['image_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'image_id'=>$data['image_id']]);
        }
    }

    public function deleteImage($id){
        // Get product image
        $productImage = ProductsImage::select('image')->where('id',$id)->first();

        // Get Product Image Paths
        $small_image_path = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path = 'front/images/product_images/large/';
    
        // Delete Product small image if exists in small folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Product medium image if exists in medium folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Product large image if exists in large folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Product image from products_images table
        ProductsImage::where('id',$id)->delete();

        $message = "Gambar produk telah berhasil dihapus";
        return redirect()->back()->with('success_message',$message);

    }

    public function addAttributes(Request $request, $id){
        Session::put('page','products');
        $product = Product::select('id','product_name','product_price','product_image')->with('attributes')->find($id);
        /*$product = json_decode(json_encode($product),true);
        dd($product);*/
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            foreach ($data['sku'] as $key => $value) {
                if(!empty($value)){

                    // SKU duplicate check
                    $skuCount = ProductsAttribute::where('sku',$value)->count();
                    if($skuCount>0){
                        return redirect()->back()->with('error_message','SKU already exists! Please add another SKU!');    
                    }

                    $sizeCount = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($sizeCount>0){
                        return redirect()->back()->with('error_message','Size already exists! Please add another Size!');    
                    }
            
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->size = $data['size'][$key];
                    $attribute->sku = $value;
                    $attribute->price = $data['price'][$key];
                    $attribute->status = 1;
                    $attribute->save();
                }
            }

            return redirect()->back()->with('success_message','Atribut produk berhasil ditambahkan');
        }

        return view('admin.attributes.add_edit_attributes')->with(compact('product'));
    }

    public function updateAttributeStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            ProductsAttribute::where('id',$data['attribute_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'attribute_id'=>$data['attribute_id']]);
        }
    }

    public function editAttributes(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            foreach ($data['attributeId'] as $key => $attribute) {
                if(!empty($attribute)){
                    ProductsAttribute::where(['id'=>$data['attributeId'][$key]])->update(['price'=>$data['price'][$key],'size'=>$data['size'][$key]]);
                }
            }
            return redirect()->back()->with('success_message','Atribut produk berhasil diperbarui');
        }
    }


}
