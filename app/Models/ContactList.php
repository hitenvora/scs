<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    use HasFactory;

    protected $fillable = [
        'sign_up_id',
        'person_name',
        'mobile_no',
        'email_id',
        'is_active',
        'created_by',
        'updated_by'
    ];


    protected $table = 'contact_lists';
}
