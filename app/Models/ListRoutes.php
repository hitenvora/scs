<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRoutes extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_lists_id',
        'document',
        'sample_collection_requests_id',
        'sample_collected_date',
    ];

    protected $table = 'listroutes';


    public function route_list()
    {
        return $this->hasOne('App\Models\RouteList', 'id', 'route_lists_id');
    }

    public function sample_colletion_list()
    {
        return $this->hasOne('App\Models\SampleCollectionRequest', 'id', 'sample_collection_requests_id');
    }
}
