<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SignUp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sign_up';

    protected $fillable = [
        'cust_name',
        'city',
        'address',
        'gst_no',
        'sample_frequencies_id ',
        'g_map_location',
        'person_name',
        'mobile_no',
        'email_id',
        'created_by',
        'updated_by'
    ];

    public function sampleFrequency()
    {
        return $this->hasOne('App\Models\SampleFrequency', 'id', 'sample_frequencies_id');
    }

    public function sample_frequency()
    {
        return $this->hasOne('App\Models\SampleFrequency', 'id', 'sample_frequencies_id');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\ContactList', 'sign_up_id', 'id');
    }
    
    public function contact()
    {
        return $this->hasMany('App\Models\ContactList', 'sign_up_id', 'id');
    }
}
