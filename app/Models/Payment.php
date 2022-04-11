<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['user_id','order_id','time_id','type_payment','discount_code','discount_price','gift_code',
        'gift_code_price','total_price','shipping_price','status','order_number','transactionId','driver'];

    public function order()
    {
        return  $this->belongsTo(Order::class,'order_id','id');
    }
    public function times()
    {
        return  $this->belongsTo(AddressTime::class,'time_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
