<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'auth_user',
        'auth_token',
        'auth_user_id',
    ];

}
