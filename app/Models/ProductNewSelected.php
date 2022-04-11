<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductNewSelected extends Model
{
    use HasFactory;
    protected $fillable =['status','product_id','category_id','subCategory_id','childCategory_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'subCategory_id','id');
    }
    public function childCategory()
    {
        return $this->belongsTo(ChildCategory::class,'childCategory_id','id');
    }
}
