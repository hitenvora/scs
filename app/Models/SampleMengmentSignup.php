<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class SampleMengmentSignup extends Authenticatable
{
    use HasFactory;

    // protected $guard = 'smslogin';
    


    protected $fillable = [
        'name',
        'mobile_no',
        'password'

    ];
    protected $table = 'sample_mengment_logins';

}
