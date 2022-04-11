<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'product_id','id');
    }
}
