<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Agrega esto

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Agrega HasApiTokens aquí

    protected $fillable = ['name', 'email', 'phone', 'password', 'user_type'];
    protected $hidden = ['password', 'remember_token'];
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
