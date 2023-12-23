<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RouteList;
use App\Models\SampleFrequency;
use Illuminate\Http\Request;

class SampleFrequencyController extends Controller
{
    public function getSampleFrequencyList(Request $request)
    {
        $SampleFrequency = SampleFrequency::select('id', 'name')->get();
        if ($SampleFrequency->count() > 0) {
            return response()->json([
                'message' => 'SampleFrequency list',
                'status' => 200,
                'data' => $SampleFrequency,
            ], 200);
        } else {
            return response()->json([
                'message' => 'SampleFrequency Not found!',
                'status' => 404,
            ]);
        }
    }

    public function routeList(Request $request)
    {
        $SampleFrequency = RouteList::select('id', 'name')->get();
        if ($SampleFrequency->count() > 0) {
            return response()->json([
                'message' => 'Route list',
                'status' => 200,
                'data' => $SampleFrequency,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Route List Not found!',
                'status' => 404,
            ]);
        }
    }
    
}
