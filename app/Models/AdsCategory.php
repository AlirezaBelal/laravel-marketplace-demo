<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsCategory extends Model
{
    use HasFactory;

    protected $fillable = ['img', 'title', 'category_id', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
