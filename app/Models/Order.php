<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['product_id','type_order','order_number','product_seller_id',
        'payment','type_payment','anbar_id',
        'transaction_id','product_vendor','product_warranty','product_color',
        'user_id','product__color_id','count','type_send'
        ,'countryName','ip','countryCode','regionCode','address_id',
        'regionName','cityName','total_price','total_discount_price'
        ,'zipCode','latitude','longitude','areaCode','type','status',
        'time_day','time_month','time_time'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function address()
    {
        return $this->belongsTo(Address::class,'address_id','id');
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
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
