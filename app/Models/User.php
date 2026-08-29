<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'mobile',
        'national_code',
        'birthday',
        'job',
        'money_back',
        'name_company',
        'national_code_company',
        'code_company',
        'sabt_company',
        'state_company',
        'city_company',
        'phone_company',
        'wallet',
        'admin',
        'staff',
        'seller',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin()
    {
        return (bool) $this->admin;
    }

    public function isStaff()
    {
        return (bool) $this->staff;
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission->name)
            || $this->hasRole($permission->roles);
    }

    public function hasRole($roles)
    {
        return $roles->intersect($this->roles)->isNotEmpty();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
