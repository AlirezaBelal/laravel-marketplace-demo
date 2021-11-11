<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'childCategory_id',
        'subCategory_id',
        'categorylevel4_id',
        'property'];

    public function childCategory()
    {
        return $this->belongsTo(ChildCategory::class, 'title', 'id');
    }
}
