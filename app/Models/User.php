<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//Spatie
use Spatie\Permission\Traits\HasRoles;

/**
 * @method bool hasRole(string|\Spatie\Permission\Models\Role $role)
 * @method bool hasAnyRole(array|\Spatie\Permission\Models\Role $roles)
 * @method bool hasAllRoles(array|\Spatie\Permission\Models\Role $roles)
 * @method $this assignRole(string|\Spatie\Permission\Models\Role $role)
 * @method $this removeRole(string|\Spatie\Permission\Models\Role $role)
 * @method $this syncRoles(array|\Spatie\Permission\Models\Role $roles)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empresa(){
        return $this->belongsTo(empresa::class);
    }
}
