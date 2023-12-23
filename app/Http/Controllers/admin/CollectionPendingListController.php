<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RouteList;
use App\Models\SampleCollectionRequest;

use Illuminate\Http\Request;
use DataTables;


class CollectionPendingListController extends Controller
{
        public function index()
        {
            return view('admin.collection_pending_list');
        }

    public function get_collection_pending_list()
    {
        $getCollectionPendingList = SampleCollectionRequest::orderBy('id','desc')->get();

        foreach ($getCollectionPendingList as $key => $record) {
            $getCollectionPendingList[$key]['route_name'] =  $record->route_list->name?? 'N/A';
            $getCollectionPendingList[$key]['map_icon'] =  '<a href="' . $record->address . '" target="_blank"><img src="../assets/img/map-icon.png" alt="map"></a>';
            $getCollectionPendingList[$key]['eye_icon'] =  '<a href="' . $record->image . '" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/829/829117.png" alt="map" style="height: 20px; width: 20px; "></a>';

        }
        return DataTables::of($getCollectionPendingList)
            ->addIndexColumn()
            ->rawColumns(['map_icon','eye_icon','route_name'])
            ->make(true);
    }
}
