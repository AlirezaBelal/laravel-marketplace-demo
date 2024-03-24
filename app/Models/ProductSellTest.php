<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSellTest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'seller_id', 'cat_id', 'cat2_id', 'cat3_id', 'cat4_id', 'cat5_id',
        'title', 'ename',
        'original', 'brand_id', 'type', 'category_id_for_product', 'start_location', 'height', 'width',
        'weight', 'length', 'detail_product', 'plus_product', 'minus_product', 'title_offer', 'img'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'cat2_id', 'id');
    }

    public function childcategory()
    {
        return $this->belongsTo(ChildCategory::class, 'cat3_id', 'id');
    }

    public function categorylevel4()
    {
        return $this->belongsTo(CategoryLevel4::class, 'cat4_id', 'id');
    }

    public function categorylevel5()
    {
        return $this->belongsTo(CategoryLevel4::class, 'cat5_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
