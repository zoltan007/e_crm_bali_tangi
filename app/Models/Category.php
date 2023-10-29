<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    public static function categoryDetails(){
        $categoryDetails = Category::select('id','category_name')->first()->toArray();
        $catIds = array();
        $catIds[] = $categoryDetails['id'];
       
    }

    public static function getCategoryName($category_id){
        $getCategoryName = Category::select('category_name')->where('id',$category_id)->first();
        return $getCategoryName->category_name;
    }
}
