<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'img',
        'discount',
        'name',
        'link'];
}
