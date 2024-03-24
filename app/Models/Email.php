<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_email', 'user_name', 'user_mobile', 'code'
        , 'title', 'text'];
}
