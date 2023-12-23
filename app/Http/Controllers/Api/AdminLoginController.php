<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\LoginToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'mobile' => 'required|numeric|min:10',
            'password' => 'required',
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

        $credentials = $request->only('mobile', 'password');

        $admin = Admin::where('mobile', $request->mobile)->first();

        if ($admin) {
            if ($admin->is_active == 0) {
                return response()->json(['message' => 'Admin not Active'], 200);
            }
            if (Auth::guard('admin')->attempt($credentials)) {
                $token = Str::random(15);
                LoginToken::create(['auth_user' => 1, 'auth_token' => $token, 'auth_user_id' => $admin->id]);
                return response()->json([
                    'message' => 'Login successful',
                    'status' => 200,
                    'auth_token' => $token,
                    'data' => $admin
                ], 200);
            }
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
        $LoginToken = LoginToken::where('auth_user', 1)->where('auth_token', $header)->where('auth_user_id', $auth_user_id)->first();
        if($LoginToken)
            $LoginToken->delete();
        // Auth::guard('admin')->logout();
        return response()->json([
            'message' => 'Logout successful',
            'status' => 200,
        ]);
    }

    public function get_admin_profile(Request $request)
    {
        $admin_id = $request->auth_user_id;
        // $admin_id = $request->admin_id;
        $Admin = Admin::where('id', $admin_id)->first();
        if (!$Admin) {
            return response()->json([
                'status' => 400,
                'message' => 'No data available',
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Data get successfully',
            'data' => $Admin,
        ]);
    }

    public function update_admin_profile(Request $request)
    {
        $rules = [
            'admin_mobile' => 'required|numeric|min:10',
            'admin_name' => 'required',
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

        // $admin_id = $request->admin_id;
        $admin_id = $request->auth_user_id;
        $admin_name = $request->admin_name;
        $admin_mobile = $request->admin_mobile;
        
        $Admin = Admin::where('id', $admin_id)->first();
        if (!$Admin) {
            return response()->json([
                'status' => 400,
                'message' => 'No data available',
            ]);
        }
        $Admin->name = $admin_name;
        $Admin->mobile = $admin_mobile;
        $Admin->save();

        return response()->json([
            'status' => 200,
            'message' => 'Admin Updated successfully',
            'data' => $Admin,
        ]);
    }
}
