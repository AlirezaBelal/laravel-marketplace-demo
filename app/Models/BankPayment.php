<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankPayment extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'user_id', 'price', 'order_number'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
