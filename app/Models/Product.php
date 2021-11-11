<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'img',
        'title',
        'link',
        'name',
        'status_product',
        'vendor_id',
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'categorylevel4_id',
        'color_id',
        'brand_id',
        'tags',
        'body',
        'description',
        'price',
        'discount_price',
        'number',
        'weight',
        'view',
        'shipment',
        'publish_product',
        'original',
        'gift',
        'order_count',
        'special'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'link' => [
                'source' => 'title'
            ]
        ];
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

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }


}
