<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;
    protected $table = 'users';

    protected $guarded = false;

    protected $hidden = [
        'created_at',
        'updated_at',
        'password'
    ];
}
