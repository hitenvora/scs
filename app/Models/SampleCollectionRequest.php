<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleCollectionRequest extends Model
{
    use HasFactory;

    public function route()
    {
        return $this->hasOne('App\Models\RouteList', 'id', 'route_lists_id');
    }
  
    public function route_list()
    {
        return $this->hasOne('App\Models\RouteList', 'id', 'route_lists_id');
    }
}
