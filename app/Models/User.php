<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;  // Import the HasRoles trait

class User extends Authenticatable
{
    use Notifiable, HasRoles;  // Use the HasRoles trait to enable role-related methods

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User roles can be checked with the hasRole() method
     * Example usage: $user->hasRole('admin')
     */
    public function hasRole($role)
{
    return $this->role === $role;  // Adjust based on your roles implementation
}
}
