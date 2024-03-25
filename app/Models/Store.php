<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['personal', 'user_id', 'store_back', 'store_name',
        'store_state', 'store_city', 'store_address', 'store_code', 'store_telephone',
    ];
}
