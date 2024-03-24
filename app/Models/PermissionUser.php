<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    use HasFactory;

    protected $table = 'permission_user';
    protected $fillable = ['permission_id', 'user_id'];
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_user', 'permission_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
