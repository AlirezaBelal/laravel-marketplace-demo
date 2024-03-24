<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;

    protected $table = 'permission_role';
    protected $fillable = ['permission_id', 'role_id'];
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'permission_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(Permission::class);
    }
}
