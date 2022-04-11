<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    protected $fillable =['user_id','code','type','date_expire','price','value_price'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
