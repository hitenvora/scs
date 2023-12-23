<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListRoutes;
use App\Models\SampleCollectionRequest;
use Illuminate\Http\Request;
use DataTables;


class ListOfRouteController extends Controller
{
    public function index()
    {
        return view('admin.list_of_route');
    }

    
    // public function get_route_list()
    // {
    //     $getRouteList = SampleCollectionRequest::orderBy('id')->get();

    //     foreach ($getRouteList as $key => $record) {
    //         // $getCustomer[$key]['sample_frequency_name'] =  $record->sample_frequency->name;
    //         $getRouteList[$key]['map_icon'] =  '<a href="' . $record->address . '" target="_blank"><img src="../assets/img/map-icon.png" alt="map"></a>';
    //         // $getUnassignedList[$key]['eye_icon'] =  '<a href="' . $record->image. '" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/829/829117.png" alt="map" style="height: 20px; width: 20px; "></a>';
    //         $getRouteList[$key]['map_icon'] =  '<a href="' . $record->mobile . '" target="_blank"><img src="../assets/img/wp.png"></a>';

    //         $id = $record->id;            
      
           
    //     }
    //     return DataTables::of($getRouteList)
    //         ->addIndexColumn()
    //         ->rawColumns(['map_icon'])
    //         ->make(true);
    // }

}
