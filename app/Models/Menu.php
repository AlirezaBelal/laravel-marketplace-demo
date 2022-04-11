<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','subCategory_id','index','childCategory_id','status'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'subCategory_id','id');
    }
    public function childCategory()
    {
        return $this->belongsTo(ChildCategory::class,'childCategory_id','id');
    }
}
