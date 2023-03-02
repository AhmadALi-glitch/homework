<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    // Providing Methods From These Trait To use them in User Controller Or Model
    use HasApiTokens, HasFactory, Notifiable;

    // Fields That Will be stored in user Row In the Database
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    // hidden fields like password or token
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Extra Information About The User Object
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
