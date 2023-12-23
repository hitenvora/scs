<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SampleCollectionRequest;
use Illuminate\Http\Request;

class UnassignedListController extends Controller
{
    public function get_unassigned_list()
    {
        $getUnassignedList = SampleCollectionRequest::whereNull('route_lists_id')->get();
        $responseData = [];
        foreach ($getUnassignedList as $value) {
            $data = [
                'id' => $value->id,
                'sample_date' => $value->sample_date,
                'sample_no' => $value->sample_no,
                'company_name' => $value->company_name,
                'address' => $value->address,
                'mobile' => $value->mobile,
                'map_location' => $value->map_location,
            ];
            if ($value->image) {
                $data['image'] = asset('upload/sample-collection-request/' . $value->image);
            }
            $responseData[] = $data;
        }
        return response()->json([
            'status' => 200,
            'message' => 'Data get successfully',
            'data' => $responseData,
        ]);
    }
}
