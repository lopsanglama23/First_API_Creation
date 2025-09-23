<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function dogs()
    {
        return $this->hasMany(\App\Models\Dog::class, 'admin_id', 'id');
    }

    public function applications()
{
    return $this->hasManyThrough(
        \App\Models\Application::class,
        \App\Models\Dog::class,
        'admin_id', // Foreign key on dogs table
        'dog_id',   // Foreign key on applications table
        'id',       // Local key on admins table
        'dog_id'    // Local key on dogs table
    );
}

}
