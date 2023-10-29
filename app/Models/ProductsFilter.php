<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;

class ProductsFilter extends Model
{
    use HasFactory;

    /*
    public static function getCategories(){
        $categoryDetails = Category::categoryDetails();
        $getProductIds = Product::select('id')->whereIn('category_id',$categoryDetails['catIds'])->pluck('id')->toArray();
        $categoryIds = Product::select('category_id')->wherein('id', $getProductIds)->groupBy('category_id')->pluck('category_id')->toArray();
        $categoryDetails = Category::select('id','category_name')->whereIn('id',$categoryIds)->get()->toArray();
        
        return $categoryDetails;
    }
    */
}
