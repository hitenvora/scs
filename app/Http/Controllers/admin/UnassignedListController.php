<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\RouteList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SampleCollectionRequest;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class UnassignedListController extends Controller
{
    public function index()
    {
        $route_list = RouteList::orderBy('id')->get();
        return view('admin.unassigned_list', compact('route_list'));
    }
    public function get_unassigned_list()
    {
        $route_list = RouteList::orderBy('id')->get();
        $getUnassignedList = SampleCollectionRequest::orderBy('id')->get();
        $routes = '<select class="form-select route-list" name="route_list">
            <option value="">Select Route </option>';
        foreach ($route_list as $key => $value) {
            $routes .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }
        $routes .= '</select>';

        foreach ($getUnassignedList as $key => $record) {
            $getUnassignedList[$key]['map_icon'] =  '<a href="' . $record->address . '" target="_blank"><img src="../assets/img/map-icon.png" alt="map"></a>';
            $getUnassignedList[$key]['eye_icon'] =  '<a href="' . $record->g_map_location . '" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/829/829117.png" alt="map" style="height: 20px; width: 20px; "></a>';
            $getUnassignedList[$key]['sample_date'] = date('d-m-Y', strtotime($record->sample_date));
            // $getUnassignedList[$key]['route_list'] =  $record->route_list->name;
            $id = $record->id;
            $getUnassignedList[$key]['dropdown'] = $routes;
        }
        return FacadesDataTables::of($getUnassignedList)
            ->addIndexColumn()
            ->rawColumns(['map_icon', 'dropdown', 'eye_icon', 'sample_date', 'route_list'])
            ->make(true);
    }

    public function updateColumn(Request $request)
    {
        // Retrieve the selected value from the request
        $selectedValue = $request->input('selectedValue');
        $sampleCollectionRequest = SampleCollectionRequest::find($selectedValue);

        if ($sampleCollectionRequest) {
            // Update the route_list column
            $sampleCollectionRequest->route_lists_id = $selectedValue;
            $sampleCollectionRequest->save();

            // Optionally, you can return a response indicating success
            return response()->json(['message' => 'Column updated successfully']);
        }

        // Handle the case where the record is not found
        return response()->json(['message' => 'Record not found'], 404);
    }
}
