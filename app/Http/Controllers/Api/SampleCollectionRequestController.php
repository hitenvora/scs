<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SampleCollectionRequest;
use App\Models\SignUp;
use App\Models\UnassignedList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class SampleCollectionRequestController extends Controller
{
    public function send_request(Request $request)
    {
        $rules = [
            'sample_date' => 'required|date_format:Y-m-d',
            'sample_no' => 'required|numeric',
            'company_name' => 'required',
            'mobile' => 'required|numeric|min:10',
            'address' => 'required',
            'image' => [
                File::types(['csv', 'pdf', 'doc', 'docx', 'jpeg', 'jpg', 'png', 'gif'])
            ]
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => 401,
                'message' => $errorMessage,
            ];
            return response()->json($response, 401);
        }

        $filename = '';

        // if ($image == '') {
        //     return response()->json(['status' => 400, 'message' => 'please select image']);
        // }
        $image = '';
        if ($request->file('image') != '') {
            $image = $request->file('image');
            $filename = str_replace(' ', '', $image->getClientOriginalName());
            $image->move(public_path('upload/sample-collection-request/'), $filename);
        }
        $auth_user_id = $request->auth_user_id;

        $sample_request = new SampleCollectionRequest();
        $sample_request->sample_date = $request->input('sample_date');
        $sample_request->sample_no = $request->input('sample_no');
        $sample_request->company_name = $request->input('company_name');
        $sample_request->mobile = $request->input('mobile');
        $sample_request->address = $request->input('address');
        $sample_request->sign_up_id = $auth_user_id;
        if (!empty($image)) {
            $sample_request->image = $filename;
        }
        $sample_request->save();

        $sample_request['image_path'] = '';
        if ($filename != '') {
            $sample_request['image_path'] = url('') . '/upload/sample-collection-request/' . $filename;
        }

        return response()->json([
            'status' => 200,
            'message' => 'Request send successfully',
            'data' => $sample_request,
        ]);
    }

    public function unsigned_list(Request $request)
    {
        $rules = [
            'sign_up_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => 401,
                'message' => $errorMessage,
            ];
            return response()->json($response, 401);
        }

        $unsigned_list = SampleCollectionRequest::whereNull('route_lists_id')->get();
        return response()->json([
            'status' => 200,
            'message' => 'Unsigned list get successfully',
            'data' => $unsigned_list,
        ]);
    }

    public function collection_pending_list(Request $request)
    {
        $collection_pending_list = SampleCollectionRequest::with('route')->whereNotNull('route_lists_id')
            ->where('sample_collected', 0)->get();
        $responseData = [];
        foreach ($collection_pending_list as $value) {
            $data = [
                'id' => $value->id,
                'sample_date' => $value->sample_date,
                'sample_no' => $value->sample_no,
                'company_name' => $value->company_name,
                'address' => $value->address,
                'mobile' => $value->mobile,
                'map_location' => $value->map_location,
                'route_name' => $value->route->name??'',
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

    public function collected_list(Request $request)
    {
        $collection_pending_list = SampleCollectionRequest::with('route')->where('sample_collected', '!=', 0)->get();
        $responseData = [];
        foreach ($collection_pending_list as $value) {
            $data = [
                'id' => $value->id,
                'sample_date' => $value->sample_date,
                'sample_no' => $value->sample_no,
                'company_name' => $value->company_name,
                'address' => $value->address,
                'mobile' => $value->mobile,
                'map_location' => $value->map_location,
                'route_name' => $value->route->name??'',
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

    public function assign_route(Request $request)
    {
        $rules = [
            'id' => 'required',
            'route_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => 401,
                'message' => $errorMessage,
            ];
            return response()->json($response, 401);
        }

        $id = $request->id;
        $route_lists_id = $request->route_id;
        $UnassignedList = SampleCollectionRequest::find($id);
        if (!$UnassignedList) {
            return response()->json([
                'status' => 400,
                'message' => 'No data found',
            ]);
        }
        $UnassignedList->route_lists_id = $route_lists_id;
        $UnassignedList->save();

        return response()->json([
            'status' => 200,
            'message' => 'Route assigned successfully',
        ]);
    }

    public function customer_details(Request $request)
    {
        $rules = [
            'customer_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => 401,
                'message' => $errorMessage,
            ];
            return response()->json($response, 401);
        }

        $customer_id = $request->customer_id;
        $customer_details = SignUp::with('contact')->where('id', $customer_id)->first();
        return response()->json([
            'status' => 200,
            'message' => 'Data get successfully',
            'data' => $customer_details,
        ]);
    }
}
