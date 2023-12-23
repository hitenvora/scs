<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];
    
    protected $table = 'route_lists';

    public function sample_request()
    {
        return $this->hasMany('App\Models\SampleCollectionRequest', 'route_lists_id', 'id')
        ->whereNotNull('route_lists_id')->where('sample_collected', 0);
    }
    
}
