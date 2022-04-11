<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;
    protected $fillable=['user_id','order_id','order_number','status'
    ,'count','item_reason','detail','img'];

    public function order()
    {
       return $this->belongsTo(Order::class,'order_id','id');
    }
    public function user()
    {
       return $this->belongsTo(User::class,'user_id','id');
    }
    public function reason()
    {
       return $this->belongsTo(ReturnReason::class,'item_reason','id');
    }
}
