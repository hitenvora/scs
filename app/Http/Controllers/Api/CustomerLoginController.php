<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactList;
use App\Models\SignUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Mail\Emailsend;
use App\Models\LoginToken;
use Illuminate\Support\Str;

class CustomerLoginController extends Controller
{
    public function login(Request $request)
    {
        $customer = $request->mobile_no;
        $user = ContactList::where('mobile_no', $customer)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Invalid mobile number.',
                'is_active' => 0,
                'status' => 200,
            ]);
        }
        Session::put('customer_id', $user->id);
        if ($user) {
            if ($user->is_active == 0) {
                return response()->json(['message' => 'Customer not Active'], 200);
            }
            $token = Str::random(15);
            LoginToken::create(['auth_user' => 2, 'auth_token' => $token, 'auth_user_id' => $user->sign_up_id]);
            return response()->json([
                'message' => 'Login successful',
                'status' => 200,
                'user' => $user,
                'token' => $token,
                'is_active' => 1,
            ], 200);
        } else {
            return response()->json([
                'message' => 'mobile number Invalid',
                'status' => 200,
                'is_active' => 0,
            ], 200);
        }
    }

    public function logout(Request $request)
    {
        $header = $request->header('Authorization');
        $auth_user_id = $request->auth_user_id;
        $LoginToken = LoginToken::where('auth_user', 2)->where('auth_token', $header)->where('auth_user_id', $auth_user_id)->first();
        if ($LoginToken)
            $LoginToken->delete();
        // Auth::guard('admin')->logout();
        return response()->json([
            'message' => 'Logout successful',
            'status' => 200,
        ]);
    }

    public function get_customer_profile(Request $request)
    {
        $customer_id = $request->auth_user_id;
        $customer_id = SignUp::with('contact')->where('id', $customer_id)->first();

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

    public function update_customer_profile(Request $request)
    {
        $rules = [
            'customer_name' => 'required',
            'customer_city' => 'required',
            'customer_address' => 'required',
            'customer_gst_no' => 'required',
            'customer_g_map_location' => 'required',
            'customer_sample_frequencies_id' => 'required',
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

        $customer_id = $request->auth_user_id;
        // $customer_id = $request->customer_id;
        $cust_name = $request->customer_name;
        $city = $request->customer_city;
        $address = $request->customer_address;
        $gst_no = $request->customer_gst_no;
        $g_map_location = $request->customer_g_map_location;
        $sample_frequencies_id = $request->customer_sample_frequencies_id;

        $customer = SignUp::where('id', $customer_id)->first();
        if (!$customer) {
            return response()->json([
                'status' => 400,
                'message' => 'No data available',
            ]);
        }
        $customer->cust_name = $cust_name;
        $customer->city = $city;
        $customer->address = $address;
        $customer->gst_no = $gst_no;
        $customer->g_map_location = $g_map_location;
        $customer->sample_frequencies_id = $sample_frequencies_id;

        $customer->save();
        return response()->json([
            'status' => 200,
            'message' => 'Customer Updated successfully',
            'data' => $customer,
        ]);
    }

    public function re_testing_add(Request $request)
    {
        $rules = [
            'request_type' => 'required',
            'remarks' => 'required',
            'document' => 'nullable',
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

        return response()->json([
            'status' => 200,
            'message' => 'Request sent success',
        ]);

        $customer_id = $request->customer_id;
        $sample_collection = $request->sample_collection;
        $remark_lab_id = $request->remark_lab_id;
        $upload_document = $request->upload_document;
        $data = $request->validate([
            "sampel-collection-date" => $customer_id,
            "remark" => $sample_collection,
            "upload_img" => $remark_lab_id,
            "phonenumber" =>  $upload_document,
            "subject" => "required",
            "message" => "required"
        ]);
        mail::to('hitenvora5666@gmail.com')->send(new Emailsend($data));
        return redirect('/contect')->with("success", "Thanks for contact with us we get your email we will contact with you Soon!");
    }
}
