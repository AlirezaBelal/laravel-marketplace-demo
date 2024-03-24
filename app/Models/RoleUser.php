<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';

    protected $fillable = ['role_id', 'user_id'];

    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'role_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
