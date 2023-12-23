<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactList;
use App\Models\SignUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LoginToken;
use Illuminate\Support\Str;

class SingUpController extends Controller
{
    public function insert(Request $request)
    {
        if ($request->sign_up_id == '') {
            $rules = [
                'cust_name' => 'required',
                'city' => 'required',
                'address' => 'required',
                'gst_no' => 'required',
                'sample_frequencies_id' => 'required',
                'g_map_location' => 'required',
                'person_name.*' => 'required',
                'mobile_no.*' => 'required|numeric|min:10',
                'email_id.*' => 'required|email',
            ];
        } else {
            $rules = [
                'cust_name' => 'required',
                'city' => 'required',
                'address' => 'required',
                'gst_no' => 'required',
                'sample_frequencies_id' => 'required',
                'g_map_location' => 'required',
                'person_name.*' => 'required',
                'mobile_no.*' => 'required|numeric|min:10',
                'email_id.*' => 'required|email',
            ];
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => 401,
                'message' => $errorMessage,
            ];
            return response()->json($response, 200);
        }

        if ($request->sign_up_id != '') {
            $SignUp = SignUp::find($request->sign_up_id);
            if (!$SignUp) {
                return response()->json(['status' => 400, 'msg' => 'SignUp details not found!']);
            }
            $SignUp->is_active = $request->is_active;
        } else {
            $SignUp = new SignUp();
        }
        $SignUp->cust_name = $request->input('cust_name');
        $SignUp->city = $request->input('city');
        $SignUp->address = $request->input('address');
        $SignUp->gst_no = $request->input('gst_no');
        $SignUp->sample_frequencies_id = $request->input('sample_frequencies_id');
        $SignUp->g_map_location = $request->input('g_map_location');
        $SignUp->save();

        $SignUpId = $SignUp->id;

        $person_name = $request->input('person_name');
        $mobile_no = $request->input('mobile_no');
        $email_id = $request->input('email_id');

        foreach ($person_name as $key => $value) {
            $ContactList = new ContactList();
            $ContactList->sign_up_id = $SignUpId;
            $ContactList->person_name = $value;
            $ContactList->mobile_no = $mobile_no[$key];
            $ContactList->email_id = $email_id[$key];
            $ContactList->save();
        }

        $ContactList = ContactList::where('sign_up_id', '=', $SignUpId)->get();

        $token = Str::random(15);
        LoginToken::create(['auth_user' => 2, 'auth_token' => $token, 'auth_user_id' => $SignUpId]);

        return response()->json([
            'status' => 200,
            'message' => 'SignUp Success',
            'data' => $SignUp,
            'token' => $token,
            'contact' => $ContactList,
        ]);
    }
    
    public function get_contact_details(Request $request)
    {
        $ContactList = ContactList::find($request->id);
        if($ContactList){
            return response()->json([
                'status' => 200,
                'message' => 'Get data Success',
                'data' => $ContactList,
            ]);
        } else {            
            return response()->json([
                'status' => 400,
                'message' => 'No data found',
            ]);
        }
    }

    public function add_contact_details(Request $request)
    {
        $rules = [
            'sign_up_id' => 'required',
            'person_name' => 'required',
            'mobile_no' => 'required',
            'email_id' => 'required',
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

        $SignUp = SignUp::find($request->sign_up_id);
        if($SignUp){
            $ContactList = new ContactList();
            $ContactList->sign_up_id = $SignUp->id;
            $ContactList->person_name = $request->person_name;
            $ContactList->mobile_no = $request->mobile_no;
            $ContactList->email_id = $request->email_id;
            $ContactList->save();
            return response()->json([
                'status' => 200,
                'message' => 'Added data success',
                'data' => $ContactList,
            ]);
        } else {            
            return response()->json([
                'status' => 400,
                'message' => 'No data found',
            ]);
        }
    }

    public function update_contact_details(Request $request)
    {
        $ContactList = ContactList::find($request->id);
        if($ContactList){
            if(isset($request->person_name))
                $ContactList->person_name = $request->person_name;
            if(isset($request->mobile_no))
                $ContactList->mobile_no = $request->mobile_no;
            if(isset($request->email_id))
                $ContactList->email_id = $request->email_id;
            $ContactList->save();
            return response()->json([
                'status' => 200,
                'message' => 'Get data Success',
                'data' => $ContactList,
            ]);
        } else {            
            return response()->json([
                'status' => 400,
                'message' => 'No data found',
            ]);
        }
    }

    public function delete_contact(Request $request)
    {
        $ContactList = ContactList::find($request->id);
        if($ContactList){
            $ContactList->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Deleted Success',
            ]);
        } else {            
            return response()->json([
                'status' => 400,
                'message' => 'No data found',
            ]);
        }
    }
}
