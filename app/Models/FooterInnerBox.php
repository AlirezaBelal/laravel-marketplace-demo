<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInnerBox extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'top'];
}
