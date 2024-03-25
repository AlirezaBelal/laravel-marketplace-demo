<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'status', 'parent', 'review',
        'review_title', 'plus_rate', 'plus_min', 'review_hidden', 'keyfiat_sakht',
        'arzesh_kharid', 'noavari', 'emkanat', 'sohoolate_estefade', 'zaher', 'ok_buy', 'liked', 'dislike', 'report'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function childcategory()
    {
        return $this->belongsTo(ChildCategory::class, 'childcategory_id', 'id');
    }

    public function categorylevel4()
    {
        return $this->belongsTo(CategoryLevel4::class, 'categorylevel4_id', 'id');
    }
}
