<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListRoutes;
use App\Models\RouteList;
use App\Models\SampleCollectionRequest;
use Illuminate\Http\Request;
use DataTables;


class CollectedController extends Controller
{
    public function index()
    {
        $routeList= RouteList::orderBy('id')->get();
        $sampleColletion= SampleCollectionRequest::orderBy('id')->get();
        return view('admin.collected' ,compact('routeList','sampleColletion'));
    }

    public function get_collected_list()
    {
        $getCollectedList = ListRoutes::orderBy('id')->get();

        foreach ($getCollectedList as $key => $record) {
            // $getCustomer[$key]['sample_frequency_name'] =  $record->sample_frequency->name;
            $getCollectedList[$key]['map_icon'] =  '<a href="' . $record->sample_colletion_list->address . '" target="_blank"><img src="../assets/img/map-icon.png" alt="map"></a>';
            $getCollectedList[$key]['eye_icon'] =  '<a href="' . $record->document . '" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/829/829117.png" alt="map" style="height: 20px; width: 20px; "></a>';
            $getCollectedList[$key]['route_list_name'] =  $record->route_list->name;
            $getCollectedList[$key]['sample_no'] =  $record->sample_colletion_list->sample_no;
            $getCollectedList[$key]['compny_name'] =  $record->sample_colletion_list->company_name;
            $getCollectedList[$key]['mobile_no'] =  $record->sample_colletion_list->mobile;
            $getCollectedList[$key]['address'] =  $record->sample_colletion_list->address;

            $id = $record->id;            
        // $getCollectedList[$key]['dropdown'] = '';
           
        }
        return DataTables::of($getCollectedList)
            ->addIndexColumn()
            ->rawColumns(['map_icon','eye_icon','route_list_name','sample_no','compny_name','mobile_no','address'])
            ->make(true);
    }
}
