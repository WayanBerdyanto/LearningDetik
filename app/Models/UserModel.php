<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'email',
        'gender',
        'birth_date',
        'role'
    ];

    protected $hidden = [
        'password',
        'id',
    ];
}
