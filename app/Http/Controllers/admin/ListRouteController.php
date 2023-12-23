<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListRoutes;
use App\Models\RouteList;
use App\Models\SampleCollectionRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;


class ListRouteController extends Controller
{
    public function index()
    {
        $routeList = RouteList::orderBy('id')->get();
        return view('admin.list_route', compact('routeList'));
    }

    public function insert_listroute(Request $request)
    {
        $rules = [
            // 'route_lists_id' => 'required', 
            'document' => 'required',
            // 'sample_collection_requests_id' => 'required',
            // 'sample_collected_date'  => 'required'

        ];
        $this->validate($request, $rules);

        $image = $request->file('document');
        $filename = '';

        if ($image == '') {
            return response()->json(['status' => '400', 'msg' => 'please select image']);
        }

        if (!empty($image)) {
            $filename = str_replace(' ', '', $image->getClientOriginalName());
            $image->move(public_path('upload/list-routes/'), $filename);
        }

        $list_routes = new ListRoutes();
        $list_routes->route_lists_id = $request->input('route_list_id');
        $list_routes->document = $filename;
        $list_routes->sample_collected_date = Carbon::now();
        $list_routes->sample_collection_requests_id = $request->input('list_route_id');


        $list_routes->save(); {
            return response()->json(['status' => '200', 'msg' => 'Added Sucessfully']);
        }
    }

    public function get_route_list()
    {
        $getRouteList = SampleCollectionRequest::orderBy('id')->get();

        foreach ($getRouteList as $key => $record) {
            // $getCustomer[$key]['sample_frequency_name'] =  $record->sample_frequency->name;
            $getRouteList[$key]['map_icon'] =  '<a href="' . $record->address . '" target="_blank"><img src="../assets/img/map-icon.png" alt="map"></a>';
            // $getUnassignedList[$key]['eye_icon'] =  '<a href="' . $record->image. '" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/829/829117.png" alt="map" style="height: 20px; width: 20px; "></a>';
            $getRouteList[$key]['contect_icon'] =  '<a href="' . $record->mobile . '" target="_blank"><img src="../assets/img/wp.png"></a>';

            // $getRouteList[$key]['company_name'] =  '  <td> <a href="' . $record->company_name . '" target="_blank">
            //     <a class="name_text" href="#" data-bs-toggle="modal"
            //         data-bs-target="#company_view">' . $record->company_name . '</a></td>';
            $getRouteList[$key]['company_name'] =  '<a class="name_text" data-id="' . $record->id . '" href="#">' . $record->company_name . '</a>';
        }
        return DataTables::of($getRouteList)
            ->addIndexColumn()
            ->rawColumns(['map_icon', 'contect_icon', 'company_name',])
            ->make(true);
    }
}
