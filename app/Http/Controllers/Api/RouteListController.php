<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RouteList;
use Illuminate\Http\Request;

class RouteListController extends Controller
{
    public function get_route_list()
    {
        $getRouteList = RouteList::select('id', 'name')->get();
        if ($getRouteList->count() > 0) {
            return response()->json([
                'message' => 'Route list',
                'status' => 200,
                'data' => $getRouteList,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Route List Not found!',
                'status' => 400,
            ]);
        }
    }
}
