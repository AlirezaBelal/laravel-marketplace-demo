<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteHeader extends Model
{
    use HasFactory;
    protected $fillable = ['title','img','link','icon','status'];
}
