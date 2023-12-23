<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LoginToken;
use App\Models\RouteList;
use App\Models\SampleCollectionRequest;
use App\Models\User;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'mobile' => 'required|numeric|min:10',
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

        $admin = User::where('mobile_no', $request->mobile)->first();

        if ($admin) {
            if ($admin->is_active == 0) {
                return response()->json(['message' => 'User not Active'], 200);
            }
            $token = Str::random(15);
            LoginToken::create(['auth_user' => 3, 'auth_token' => $token, 'auth_user_id' => $admin->id]);
            return response()->json([
                'message' => 'Login successful',
                'status' => 200,
                'auth_token' => $token,
                'data' => $admin
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials',
            'status' => 401,
        ]);
    }

    public function logout(Request $request)
    {
        $header = $request->header('Authorization');
        $auth_user_id = $request->auth_user_id;
        $LoginToken = LoginToken::where('auth_user', 3)->where('auth_token', $header)->where('auth_user_id', $auth_user_id)->first();
        if($LoginToken){
            $LoginToken->delete();
        }
        return response()->json([
            'message' => 'Logout successful',
            'status' => 200,
        ]);
    }

    public function get_profile(Request $request)
    {
        $customer_id = $request->auth_user_id;
        $customer_id = User::where('id', $customer_id)->first();
        if (!$customer_id) {
            return response()->json([
                'status' => 400,
                'message' => 'No data available',
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Customer get successfully',
            'data' => $customer_id,
        ]);
    }

    public function update_employee_profile(Request $request)
    {
        $rules = [
            'name' => 'required',
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
        $auth_user_id = $request->auth_user_id;
        $name = $request->name;
        
        $customer = User::where('id', $auth_user_id)->first();
        if (!$customer) {
            return response()->json([
                'status' => 400,
                'message' => 'No data available',
            ]);
        }
        $customer->name = $name;
        $customer->save();

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully',
            'data' => $customer,
        ]);
    }

    public function route_request_list(Request $request)
    {
        $auth_user_id = $request->auth_user_id;
        $RouteList = RouteList::withCount('sample_request')->get();
        return response()->json([
            'status' => 200,
            'message' => 'Route list get successfully',
            'data' => $RouteList,
        ]);    
    }

    public function sample_route_wise_list(Request $request)
    {
        $rules = [
            'route_lists_id' => 'required',
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

        $auth_user_id = $request->auth_user_id;
        $route_lists_id = $request->route_lists_id;
        $collection_pending_list = SampleCollectionRequest::with('route')->where('route_lists_id', $route_lists_id)
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
    
    public function sample_collected(Request $request)
    {
        $rules = [
            'sample_id' => 'required',
            'sample_collected' => 'required',
            'document' => 'nullable|file',
            'route_lists_id' => 'nullable',
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

        $auth_user_id = $request->auth_user_id;
        $sample_id = $request->sample_id;
        $sample_collected = $request->sample_collected;
        $document = $request->document;
        $route_lists_id = $request->route_lists_id;
        $SampleCollectionRequest = SampleCollectionRequest::find($sample_id);
        if(!$SampleCollectionRequest){
            return response()->json([
                'status' => 400,
                'message' => 'Sample details not found!',
            ]);
        }
        
        $filename = '';
        $image = '';
        if ($request->file('document') != '') {
            $image = $request->file('document');
            $filename = str_replace(' ', '', $image->getClientOriginalName());
            $image->move(public_path('upload/sample-collection-request/'), $filename);
        }

        $SampleCollectionRequest->sample_collected = $sample_collected;
        $SampleCollectionRequest->user_id = $auth_user_id;
        if($route_lists_id != '')
            $SampleCollectionRequest->route_lists_id = $route_lists_id;
        if (!empty($image)) {
            $SampleCollectionRequest->image = $filename;
        }
        $SampleCollectionRequest->save();
        
        return response()->json([
            'status' => 200,
            'message' => 'Sample Updated successfully',
            'data' => $SampleCollectionRequest,
        ]);
    }
}
