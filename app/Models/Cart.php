<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['product_id','product_seller_id','product_price','product_price_discount',
        'product_color','product_vendor','product_warranty','user_id','count'
    ,'countryName','ip','countryCode','regionCode','regionName','cityName'
    ,'zipCode','latitude','longitude','areaCode','type','read_cart','view'
        ,'price_old','product_price_discount_old'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'product_color','id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'product_vendor','id');
    }
    public function warranty()
    {
        return $this->belongsTo(Warranty::class,'product_warranty','id');
    }
    public function productSeller()
    {
        return $this->belongsTo(ProductSeller::class,'product_seller_id','id');
    }
}
