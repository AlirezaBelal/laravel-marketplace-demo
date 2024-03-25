<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = ['code_seller', 'type_seller', 'brand_name', 'user_id',
        'name', 'lname', 'gender', 'birth', 'national_code', 'shenasname_code', 'maliat',
        'logo', 'about', 'bank_shaba', 'bank_account_name', 'email', 'mobile',
        'website', 'state', 'city', 'address', 'pin_code', 'telephone',
        'location', 'ghardad_status', 'ghardad_number', 'ghardad_file', 'ghardad_start_day',
        'ghardad_end_day', 'ghardad_invoice', 'ghardad_pay', 'learning_status', 'wallet',

    ];
}
